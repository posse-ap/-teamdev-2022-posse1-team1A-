<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_id;
        $checkrole = explode(',', $role);
        if (in_array(2, $checkrole)) {
            return redirect()->route('admin.userlist');
        } elseif(in_array(1, $checkrole)) {
            // TODO: チャット機能をマージしたらリダイレクト先を一覧画面に
            return redirect()->route('user_index');
        }
    }
}
