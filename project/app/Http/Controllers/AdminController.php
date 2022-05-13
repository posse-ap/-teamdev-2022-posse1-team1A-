<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountStatus;
use App\Models\ScheduleStatus;
use App\Models\Calling;
use App\Models\InterviewSchedule;
use App\Models\Chat;

class AdminController extends Controller
{
    public function index()
    {
        $total_count_users = User::count(); //総会員数
        $total_count_matched = Chat::count();// 総マッチ数
        $total_count_call = Calling::count(); // 総通話数
        $avg_calling_time = Calling::avg('calling_time'); // 平均通話時間
        $total_count_cancelled = InterviewSchedule::where('schedule_status_id',ScheduleStatus::getCancelId())->count();// 日程調整失敗数
        return view('admin.index', compact('total_count_users','total_count_matched','total_count_call', 'avg_calling_time','total_count_cancelled'));
    }

    public function userlist()
    {
        $users = User::paginate(10);
        $keyword = null;

        return view('admin.user-list', compact('users', 'keyword'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = User::query();

        if (!empty($keyword)) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($keyword, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach ($wordArraySearched as $value) {
                $query->where(function ($query) use ($value) {
                    $query->where('name', 'LIKE', "%{$value}%")
                        ->orWhere('nickname', 'LIKE', "%{$value}%")
                        ->orWhere('company', 'LIKE', "%{$value}%")
                        ->orWhere('department', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            }

            $users = $query->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('admin.user-list', compact('users', 'keyword'));
    }

    public function accountStop(Request $request)
    {
        $user = User::find($request->id);
        $user->account_status_id = AccountStatus::getStoppedId();
        $user->save();

        return redirect()->route('admin.userlist');
    }

    public function accountActive(Request $request)
    {
        $user = User::find($request->id);
        $user->account_status_id = AccountStatus::getActiveId();
        $user->save();

        return redirect()->route('admin.userlist');
    }
}
