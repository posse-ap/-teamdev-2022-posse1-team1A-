<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccountStatus;

class AdminController extends Controller
{
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
