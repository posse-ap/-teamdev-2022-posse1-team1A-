<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;

class ChatController extends Controller
{
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

    public function main(Request $request)
    {
        // チャットルームのidを受け取る
        $chatRoomId      = 1;

        // チャットルームの情報を取得
        $chat            = Chat::find($chatRoomId);

        // チャットルームの参加者情報を取得
        $client_user     = User::find($chat->client_user_id);
        $respondent_user = User::find($chat->respondent_user_id);

        // 回答者のアイコン情報を取得
        $respondent_user_icon = $respondent_user->icon;

        // 該当チャットの内容をすべて取得
        $chatRecords     = ChatRecord::where('chat_id', '=', $chatRoomId)->get();

        // 日程決定しているか真偽を取得
        $isReserved      = 1;

        // 日付をフォーマット
        foreach ($chatRecords as $chatRecord) {
            if ($chatRecord->updated_at) {
                $chatRecord->date = $chatRecord->updated_at->format('Y/m/d');
            }
        }


        return view('chat.main', compact('chatRecords', 'respondent_user', 'client_user', 'isReserved', 'respondent_user_icon', 'chatRoomId'));
    }

    public function post(Request $request)
    {
        $newChatRecord = new ChatRecord;
        $newChatRecord->chat_id = $request->chatRoomId;
        $newChatRecord->user_id = $request->user_id;
        $newChatRecord->comment = $request->comment;
        $newChatRecord->save();
        return redirect('/chat/main');
    }
}
