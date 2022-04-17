<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request){

        // return view('index', compact('total'));
        return view('chat.index');
    }

    public function main(Request $request){

        // return view('index', compact('total'));
        return view('chat.main');
    }
}
