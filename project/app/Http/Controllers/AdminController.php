<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('nickname', 'LIKE', "%{$keyword}%")
                ->orWhere('company', 'LIKE', "%{$keyword}%")
                ->orWhere('department', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        }

        $users = $query->paginate(10);

        return view('admin.user-list', compact('users', 'keyword'));
    }
}
