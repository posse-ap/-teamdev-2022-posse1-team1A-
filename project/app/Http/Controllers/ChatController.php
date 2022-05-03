<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;

class ChatController extends Controller
{
    public function index(Request $request, $chat_id)
    {
        // チャットルームのidを受け取る
        $chatRoomId      = $chat_id;

        // チャットルームの情報を取得
        $chat            = Chat::find($chatRoomId);

        // チャットルームの参加者情報を取得
        $loginUser = User::find(Auth::id());
        $loginUserId = $loginUser->id;

        // 相手の情報を取得
        $respondentUserId = $chat->respondent_user_id;
        $clientUserId = $chat->client_user_id;
        if ($respondentUserId === $loginUser->id) {
            $partnerUser = User::find($clientUserId);
            $isClientChat = false;
        } else {
            $partnerUser = User::find($respondentUserId);
            $isClientChat = true;
        }

        $partnerUserIcon = $partnerUser->icon;
        $partnerUserName = $partnerUser->nickname;

        // 該当チャットの内容をすべて取得
        $chatRecords     = ChatRecord::where('chat_id', $chatRoomId)->get();

        // 日程決定しているか真偽を取得
        $isReserved      = 1;

        // 日付をフォーマット
        foreach ($chatRecords as $chatRecord) {
            if ($chatRecord->updated_at) {
                $chatRecord->date = $chatRecord->updated_at->format('Y/m/d');
            }
        }

        return view('chat.index', compact('chatRecords', 'chatRoomId', 'isClientChat', 'isReserved', 'loginUserId', 'partnerUserIcon', 'partnerUserName'));
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required',
        ]);

        ChatRecord::create([
            'chat_id' => $request->chatRoomId,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);
        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }

    public function client_chat_list(Request $request)
    {
        $client_chats = Chat::where('client_user_id', Auth::id())->where('is_finished', false)->get();
        return view('chat.client-chat-list', compact('client_chats'));
    }

    public function respondent_chat_list(Request $request)
    {
        $respondent_chats = Chat::where('respondent_user_id', Auth::id())->where('is_finished', false)->get();
        return view('chat.respondent-chat-list', compact('respondent_chats'));
    }
}
