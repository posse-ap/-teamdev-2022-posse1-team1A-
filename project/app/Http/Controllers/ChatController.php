<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;
use App\Models\Calling;
use App\Models\InterviewSchedule;
use App\Models\ScheduleStatus;

class ChatController extends Controller
{
    public function index(Request $request, $chat_id)
    {
        // チャットルームのidを受け取る
        $chatRoomId      = $chat_id;

        // チャットルームの情報を取得
        $chat            = Chat::find($chatRoomId);

        // チャットルームの参加者情報を取得
        $loginUser = User::find(Auth::id());
        $loginUserId = $loginUser->id;

        // 相手の情報を取得
        $respondentUserId = $chat->respondent_user_id;
        $clientUserId = $chat->client_user_id;
        if ($respondentUserId === $loginUser->id) {
            $partnerUser = User::find($clientUserId);
            $isClientChat = false;
        } else {
            $partnerUser = User::find($respondentUserId);
            $isClientChat = true;
        }

        $partnerUserIcon = $partnerUser->icon;
        $partnerUserName = $partnerUser->nickname;

        // 該当チャットの内容をすべて取得
        $chatRecords     = ChatRecord::where('chat_id', $chatRoomId)->get();

        // 日程決定しているか真偽を取得
        $isReserved      = 1;

        // 日付をフォーマット
        foreach ($chatRecords as $chatRecord) {
            if ($chatRecord->updated_at) {
                $chatRecord->date = $chatRecord->updated_at->format('Y/m/d');
            }
        }

        // 通話用のkey取得
        $skyway_key = config('skyway_key');
        $loginUserPeerId = $loginUser->peer_id;
        $partnerUserPeerId = $partnerUser->peer_id;

        return view('chat.index', compact('chatRecords', 'chatRoomId', 'isClientChat', 'isReserved', 'loginUserId', 'loginUserPeerId', 'partnerUserPeerId', 'partnerUserIcon', 'partnerUserName', 'skyway_key'));
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        ChatRecord::create([
            'chat_id' => $request->chatRoomId,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);
        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }

    public function call_start(Request $request)
    {
        $calling = Calling::create([
            'chat_id' => $request->chat_id,
        ]);
        return redirect(route('chat.call', ['calling_id' => $calling->id]));
    }

    public function client_call(Request $request, $calling_id)
    {
        $call = Calling::find($calling_id);
        $chat = Chat::find($call->chat_id);
        // チャットルームの参加者情報を取得
        $loginUser = User::find(Auth::id());
        $loginUserId = $loginUser->id;

        // 相手の情報を取得
        $respondentUserId = $chat->respondent_user_id;
        $clientUserId = $chat->client_user_id;

        // TODO: 回答者ユーザーの値だけを取るよう変更
        if ($respondentUserId === $loginUser->id) {
            $partnerUser = User::find($clientUserId);
        } else {
            $partnerUser = User::find($respondentUserId);
        }
        $partnerUserIcon = $partnerUser->icon;
        $partnerUserName = $partnerUser->nickname;

        // 通話用のkey取得
        $skyway_key = config('skyway_key');
        $loginUserPeerId = $loginUser->peer_id;
        $partnerUserPeerId = $partnerUser->peer_id;
        return view('chat.client-calling', compact('skyway_key', 'loginUserPeerId', 'partnerUserPeerId', 'partnerUserIcon', 'partnerUserName'));
    }

    public function client_chat_list(Request $request)
    {
        $client_chats = Chat::where('client_user_id', Auth::id())->where('is_finished', false)->get();
        return view('chat.client-chat-list', compact('client_chats'));
    }

    public function respondent_chat_list(Request $request)
    {
        $user = User::find(Auth::id());
        $respondent_chats = Chat::where('respondent_user_id', Auth::id())->where('is_finished', false)->get();
        return view('chat.respondent-chat-list', compact('respondent_chats', 'user'));
    }

    public function reception_stop(Request $request)
    {
        $user = User::find(Auth::id());

        $user->is_search_target = false;
        $user->save();

        return redirect()->route('chat.respondent_chat_list');
    }

    public function reception_start(Request $request)
    {
        $user = User::find(Auth::id());

        $user->is_search_target = true;
        $user->save();

        return redirect()->route('chat.respondent_chat_list');
    }

    public function schedule(Request $request)
    {
        $schedule = new InterviewSchedule;
        $schedule->schedule_status_id = ScheduleStatus::getPendingId();
        $schedule->schedule = $request->schedule;
        $schedule->chat_id = $request->chatRoomId;
        $schedule->save();
        
        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }
}
