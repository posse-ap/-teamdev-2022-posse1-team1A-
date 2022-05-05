<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $keyword = null;
        return view('user.index', compact('keyword'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        return redirect()->route('user_result', ['keyword' => $keyword]);
    }

    public function result($keyword = "")
    {

        $query = User::query();

        if (!empty($keyword)) {

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
                        ->orWhere('department', 'LIKE', "%{$value}%");
                });
            }

            $users = $query->paginate(20);
        } else {
            $users = User::where('role_id', Role::getUserId())->where('is_search_target', true)->paginate(20);
        }

        return view('user.search', compact('users', 'keyword'));
    }

    public function userPage(Request $request)
    {
        $userId = 1;
        $userInfo = User::find($userId);
        return view('user.info', compact('userInfo'));
    }
}
