<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Chat;
use App\Models\AccountStatus;
use App\Models\PayPay;
use App\Models\ChatRecord;
use App\Models\InterviewSchedule;
use App\Models\ScheduleStatus;
use App\Models\Ticket;
use App\Models\TicketStatus;
use App\Models\ChatStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithDrawn;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            PayPay::polling();
        }
        $keyword = null;
        return view('user.index', compact('keyword'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        return redirect()->route('user_result', ['keyword' => $keyword]);
    }

    public function result($keyword = "", Request $request)
    {
        $query = User::query()->where('account_status_id', AccountStatus::getActiveId());
        if (empty($keyword)) {
            if (Auth::check()) {
                $users = $query->where('role_id', Role::getUserId())->where('is_search_target', true)->whereNotIn('id', [Auth::id()])->paginate(20);
            } else {
                $users = $query->where('role_id', Role::getUserId())->where('is_search_target', true)->paginate(20);
            }
        } else {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where('role_id', Role::getUserId());
                $query->where('is_search_target', true);
                $query->where(function ($query) use ($value) {
                    $query->where('company', 'LIKE', "%{$value}%")
                        ->orWhere('department', 'LIKE', "%{$value}%")
                        ->orWhere('nickname', 'LIKE', "%{$value}%");
                });
            }

            if (Auth::check()) {
                $users = $query->whereNotIn('id', [Auth::id()])->paginate(20);
            } else {
                $users = $query->paginate(20);
            }
        }
        $can_start_chat = $request->can_start_chat;
        $ticket_counts = $request->ticket_counts;

        return view('user.search', compact('users', 'keyword', 'can_start_chat', 'ticket_counts'));
    }

    public function userPage(Request $request)
    {
        $userInfo = User::find(Auth::id());
        return view('user.info', compact('userInfo'));
    }

    public function withdrawal()
    {
        $user = User::find(Auth::id());

        return view('user.withdrawal', compact('user'));
    }

    public function withdrawalPost(Request $request)
    {
        $request->validate([
            'reason' => 'required',
            'id' => 'required',
        ]);

        $user = User::find($request->id);

        $user->account_status_id = AccountStatus::getWithdrawnId();
        $user->reason = $request->reason;
        $user->save();

        // メール
        Mail::to($user->email)->send(new WithDrawn($user));

        // ログアウト処理
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // anoveybot送信（ユーザーが依頼者だったルームに送信）
        $chats = User::find($request->id)->client_chats;
        foreach ($chats as $chat) {
            $chat_record = new ChatRecord;
            $chat_record->chat_id = $chat->id;
            $chat_record->user_id = Role::getBotId();
            $chat_record->comment = $user->nickname . "さんがサービスを退会しました。恐れ入りますが、他の方をお探しください。";
            $chat_record->save();
        }

        // anoveybot送信（ユーザーが回答者だったルームに送信）
        $chats = User::find($request->id)->respondent_chats;
        foreach ($chats as $chat) {
            $chat_record = new ChatRecord;
            $chat_record->chat_id = $chat->id;
            $chat_record->user_id = Role::getBotId();
            $chat_record->comment = $user->nickname . "さんがサービスを退会しました。恐れ入りますが、他の方をお探しください。";
            $chat_record->save();
        }
        
        return redirect()->route('user_index');
    }

    public function userEdit()
    {
        $userId = Auth::id();
        $userInfo = User::find($userId);
        return view('user.edit', compact('userInfo'));
    }

    public function userUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'email' => 'required|email',
            'telephone_number' => 'required|numeric',
            'company' => 'required',
            'department' => 'required',
            'length_of_service' => 'required',
            'is_search_target' => 'required',
        ]);

        $user = User::find($request->id);
        if ($request->icon) {
            $icon = $request->file('icon');
            $icon->storeAs('', $icon->getClientOriginalName(), 'public');
            $iconPath = 'storage/' . $icon->getClientOriginalName();
        } else {
            $iconPath = $user->icon;
        }
        $user->update([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'icon' => $iconPath,
            'telephone_number' => $request->telephone_number,
            'company' => $request->company,
            'department' => $request->department,
            'length_of_service' => $request->length_of_service,
            'is_search_target' => $request->is_search_target,
        ]);

        return redirect(route('user_page'));
    }

    public function beginner()
    {
        return view('user.beginner');
    }
}
