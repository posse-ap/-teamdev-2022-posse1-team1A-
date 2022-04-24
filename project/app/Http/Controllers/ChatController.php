<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;

class ChatController extends Controller
{
    public function index(Request $request){

        // return view('index', compact('total'));
        return view('chat.index');
    }

    public function main(Request $request){
        // チャットルームのidを受け取る
        $chatRoomId      = 1;

        // チャットルームの情報を取得
        $chat            = Chat::find($chatRoomId);

        // チャットルームの参加者情報を取得
        $client_user     = User::where('id', '=', $chat->client_user_id)->first();
        $respondent_user = User::where('id', '=', $chat->respondent_user_id)->first();

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
        // dd($chatRecords);


        return view('chat.main', compact('chatRecords', 'respondent_user', 'client_user', 'isReserved', 'respondent_user_icon', 'chatRoomId'));
    }

    public function post(Request $request)
    {
        // dd($request);
        $newChatRecord = new ChatRecord;
        $newChatRecord->chat_id = $request->chatRoomId;
        $newChatRecord->user_id = $request->user_id;
        $newChatRecord->comment = $request->comment;
        $newChatRecord->save();
        // $user_data->update(['is_admin' => 1]);
        return redirect('/chat/main');
    }
}
