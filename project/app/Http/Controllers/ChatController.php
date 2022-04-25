<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;
use App\Models\InterviewSchedule;

class ChatController extends Controller
{
    public function index(Request $request){
        $interviewSchedules = InterviewSchedule::all();
        // ユーザーIDを取得
        $userId       = 1;
        // チャットルームの情報を取得
        $chatRooms    = Chat::where('client_user_id', '=', $userId)
                            ->where('is_finished', '=', 0)
                            ->get();
        // チャットルームの相手の名前を取得
        foreach ($chatRooms as $key => $chatRoom) {
            $chatRoom->respondent_user_name      = User::where('id', '=', $chatRoom->respondent_user_id)->first()->name;
            $chatRoom->newestChatRecord          = ChatRecord::where('user_id', '=', $chatRoom->respondent_user_id)
            ->orderBy('created_at', 'desc')
            ->first();

            // 指定文字数以上になった場合、「...」で省略されるようにします
            $chatRoom->newestChatRecord->comment = mb_strimwidth( $chatRoom->newestChatRecord->comment, 0, 30, '…', 'UTF-8' );;

            if (InterviewSchedule::where('chat_id', '=', $chatRoom->id)->first()->schedule_status_id) {
                $chatRoom->schedule    = InterviewSchedule::where('chat_id', '=', $chatRoom->id)->first()->schedule;
                $chatRoom->schedule    = substr($chatRoom->schedule,5,11);
                $chatRoom->schedule    = str_replace('-', '/', $chatRoom->schedule);
            }
        }
        // dd($chatRooms);
        return view('chat.index', compact('chatRooms'));
    }

    public function main(){
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
