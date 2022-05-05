<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index(Request $request, $chat_id){
        $partner_name = $request->partner_user_name;
        return view('chat.call-screen', compact('chat_id', 'partner_name'));
    }

    public function show($chat_id){
        return view('chat.call-screen', compact('chat_id'));
    }
}
