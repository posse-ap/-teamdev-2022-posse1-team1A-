<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function userlist()
    {
        $users = User::paginate(10);
        return view('admin.user-list', compact('users'));
    }
}
