<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function userlist()
    {
        // $users = User::All();
        $users = User::paginate(10);
        // dd($users);
        return view('admin.user-list', compact('users'));
    }
}
