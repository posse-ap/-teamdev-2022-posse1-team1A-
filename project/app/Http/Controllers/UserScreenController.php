<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserScreenController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
}
