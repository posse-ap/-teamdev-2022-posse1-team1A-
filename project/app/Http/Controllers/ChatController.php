<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageSent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;
use App\Models\CallingEvaluation;
use App\Models\Calling;
use App\Models\InterviewSchedule;
use App\Models\ScheduleStatus;

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
        $isReserved = InterviewSchedule::where('chat_id', $chatRoomId)
            ->where('schedule_status_id', ScheduleStatus::getPendingId())
            ->exists();

        $interviewSchedule = InterviewSchedule::where('chat_id', $chat_id)
            ->where('schedule_status_id', ScheduleStatus::getPendingId())
            ->latest()
            ->first();

        // 日付をフォーマット
        foreach ($chatRecords as $chatRecord) {
            if ($chatRecord->updated_at) {
                $chatRecord->date = $chatRecord->updated_at->format('Y/m/d');
            }
        }

        // 通話用のkey取得
        $skyway_key = config('skyway_key');
        $loginUserPeerId = $loginUser->peer_id;
        $partnerUserPeerId = $partnerUser->peer_id;

        // チケット存在確認
        $have_tickets = $request->have_tickets;
        $ticket_counts = $loginUser->countTickets();

        return view('chat.index', compact('chatRecords', 'chatRoomId', 'isClientChat', 'isReserved', 'loginUserId', 'loginUserPeerId', 'partnerUserPeerId', 'partnerUserIcon', 'partnerUserName', 'skyway_key', 'have_tickets', 'ticket_counts', 'interviewSchedule'));
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

        $sender = User::find(Auth::id());
        // 相手のデータ取得
        if (Auth::id() === Chat::find($request->chatRoomId)->client_user_id) {
            $receiver_id = Chat::find($request->chatRoomId)->respondent_user_id;
        } else {
            $receiver_id = Chat::find($request->chatRoomId)->client_user_id;
        }
        $receiver = User::find($receiver_id);
        Mail::to($receiver->email)->send(new MessageSent($sender, $receiver));
        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }

    public function call_start(Request $request)
    {
        $calling = Calling::create([
            'chat_id' => $request->chat_id,
        ]);
        return redirect(route('chat.call', ['calling_id' => $calling->id]));
    }

    public function client_call(Request $request, $calling_id)
    {
        $call = Calling::find($calling_id);
        $chat = Chat::find($call->chat_id);
        $chatRoomId = $chat->id;
        // チャットルームの参加者情報を取得
        $loginUser = User::find(Auth::id());
        $loginUserId = $loginUser->id;

        // 相手の情報を取得
        $respondentUserId = $chat->respondent_user_id;
        $clientUserId = $chat->client_user_id;

        // TODO: 回答者ユーザーの値だけを取るよう変更
        if ($respondentUserId === $loginUser->id) {
            $partnerUser = User::find($clientUserId);
        } else {
            $partnerUser = User::find($respondentUserId);
        }
        $partnerUserIcon = $partnerUser->icon;
        $partnerUserName = $partnerUser->nickname;

        // 通話用のkey取得
        $skyway_key = config('skyway_key');
        $loginUserPeerId = $loginUser->peer_id;
        $partnerUserPeerId = $partnerUser->peer_id;
        return view('chat.client-calling', compact('skyway_key', 'loginUserPeerId', 'partnerUserPeerId', 'partnerUserIcon', 'partnerUserName', 'chatRoomId', 'loginUserId'));
    }

    public function client_chat_list(Request $request)
    {
        $client_chats = Chat::where('client_user_id', Auth::id())->where('is_finished', false)->get();
        return view('chat.client-chat-list', compact('client_chats'));
    }

    public function respondent_chat_list(Request $request)
    {
        $user = User::find(Auth::id());
        $respondent_chats = Chat::where('respondent_user_id', Auth::id())->where('is_finished', false)->get();
        return view('chat.respondent-chat-list', compact('respondent_chats', 'user'));
    }

    public function reception_stop(Request $request)
    {
        $user = User::find(Auth::id());

        $user->is_search_target = false;
        $user->save();

        return redirect()->route('chat.respondent_chat_list');
    }

    public function reception_start(Request $request)
    {
        $user = User::find(Auth::id());

        $user->is_search_target = true;
        $user->save();

        return redirect()->route('chat.respondent_chat_list');
    }

    public function schedule(Request $request)
    {
        $schedule = new InterviewSchedule;
        $schedule->schedule_status_id = ScheduleStatus::getPendingId();
        $schedule->schedule = $request->schedule;
        $schedule->chat_id = $request->chatRoomId;
        $schedule->save();

        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }
    public function schedule_cancel(Request $request, $chat_id)
    {
        $interviewSchedule = InterviewSchedule::find($request->interview_schedule_id);
        $interviewSchedule->schedule_status_id = ScheduleStatus::getCancelId();
        $interviewSchedule->save();
        return redirect(route('chat.index', ['chat_id' => $chat_id]));
    }

    public function post_review(Request $request)
    {
        $validated = $request->validate([
            'calling_id' => 'required',
            'user_id' => 'required',
            'is_satisfied' => 'required',
        ]);
        CallingEvaluation::create([
            'calling_id' => $request->chatRoomId,
            'user_id' => $request->loginUserId,
            'is_satisfied' => $request->boolean('is_satisfied'),
            'comment' => $request->review_comment,
        ]);
    }
}
