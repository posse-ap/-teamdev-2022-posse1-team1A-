<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageSent;
use App\Mail\DateScheduled;
use App\Mail\ExitedChat;
use App\Mail\PartnerExitedChat;
use App\Mail\ChangedSchedule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatRecord;
use App\Models\CallingEvaluation;
use App\Models\Calling;
use App\Models\InterviewSchedule;
use App\Models\ScheduleStatus;
use App\Models\Role;
use App\Models\ChatStatus;
use App\Models\Ticket;
use App\Models\TicketStatus;

class ChatController extends Controller
{
    public function index(Request $request, $chat_id)
    {
        // チャットルームのidを受け取る
        $chatRoomId      = $chat_id;

        // チャットルームの情報を取得
        $chat            = Chat::find($chatRoomId);

        $call = Calling::where('chat_id', $chatRoomId)->where('is_finished', false)->orderBy('created_at', 'desc')->first();

        // チャットルームの参加者情報を取得
        $loginUser = User::find(Auth::id());
        $loginUserId = $loginUser->id;

        // 相手の情報を取得
        $respondentUserId = $chat->respondent_user_id;
        $clientUserId = $chat->client_user_id;
        if ($respondentUserId === $loginUser->id) {
            $partnerUser = User::find($clientUserId);
            $isClientChat = false;
            $isRespondent = true;
        } else {
            $partnerUser = User::find($respondentUserId);
            $isClientChat = true;
            $isRespondent = false;
        }

        $partnerUserIcon = $partnerUser->icon;
        $partnerUserName = $partnerUser->nickname;

        // 該当チャットの内容をすべて取得
        $chatRecords     = ChatRecord::where('chat_id', $chatRoomId)->get();

        // 日程決定しているか真偽を取得
        $isReserved = InterviewSchedule::where('chat_id', $chatRoomId)
            ->where('schedule_status_id', ScheduleStatus::getPendingId())
            ->exists();

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

        // 相談日程取得
        $interview_schedule = InterviewSchedule::where('chat_id', $chat_id)->where('schedule_status_id', ScheduleStatus::getPendingId())->latest()->first();

        // 既読機能
        $update_column = [
            'is_read' => true,
        ];
        ChatRecord::where('chat_id', $chatRoomId)->where('user_id', '<>', Auth::id())->where('is_read', false)->update($update_column);

        return view('chat.index', compact('chatRecords', 'chatRoomId', 'isClientChat', 'isRespondent', 'isReserved', 'loginUserId', 'loginUserPeerId', 'partnerUserPeerId', 'partnerUserIcon', 'partnerUserName', 'skyway_key', 'have_tickets', 'ticket_counts', 'call', 'interview_schedule'));
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

        $chat_record = new ChatRecord;
        $chat_record->chat_id = $request->chat_id;
        $chat_record->user_id = Role::getBotId();
        $chat_record->comment = "通話が開始されました。";
        $chat_record->save();

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

        // falseとして0を使用
        $isRespondent = 0;

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
        return view('chat.client-calling', compact('skyway_key', 'loginUserPeerId', 'partnerUserPeerId', 'partnerUserIcon', 'partnerUserName', 'chatRoomId', 'loginUserId', 'call', 'isRespondent'));
    }

    public function calling_time(Request $request, $calling_id)
    {
        $call = Calling::find($calling_id);
        $call->calling_time = $request->calling_time;
        $call->save();
        return redirect(route('chat.call', ['calling_id' => $calling_id]));
    }

    public function finish_call(Request $request, $calling_id)
    {
        $call = Calling::find($calling_id);
        $call->is_finished = true;
        $call->save();

        $interviewSchedule = InterviewSchedule::where('chat_id', $call->chat_id)->where('schedule_status_id', ScheduleStatus::getPendingId())->first();
        $interviewSchedule->schedule_status_id = ScheduleStatus::getFinishedId();
        $interviewSchedule->save();

        $ticket = Ticket::where('user_id', Auth::id())->where('chat_id', $call->chat_id)->where('ticket_status_id', TicketStatus::getUsingId())->first();
        $ticket->calling_id = $call->id;
        $ticket->ticket_status_id = TicketStatus::getUsedId();
        $ticket->save();
        return redirect(route('chat.call', ['calling_id' => $calling_id]));
    }

    public function client_chat_list(Request $request)
    {
        $client_chats = Chat::where('client_user_id', Auth::id())->where('is_finished', false)->get();

        // チケット枚数
        $loginUser = User::find(Auth::id());
        $ticket_counts = $loginUser->countTickets();

        return view('chat.client-chat-list', compact('client_chats', 'ticket_counts'));
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

        $ticket = Ticket::where('user_id', Auth::id())->where('ticket_status_id', TicketStatus::getPendingId())->first();
        $ticket->chat_id = $request->chatRoomId;
        $ticket->ticket_status_id = TicketStatus::getUsingId();
        $ticket->save();

        $chat_record = new ChatRecord;
        $chat_record->chat_id = $request->chatRoomId;
        $chat_record->user_id = Role::getBotId();
        $chat_record->comment = "相談日程は " . $schedule->schedule->format('Y/m/d H:i') . " に予約されました。";
        $chat_record->save();

        // 両者にメール
        $scheduled_date = $schedule->schedule->format('Y/m/d H:i');
        $client_id = Chat::find($request->chatRoomId)->client_user_id;
        $client = User::find($client_id);
        $respondent_id = Chat::find($request->chatRoomId)->respondent_user_id;
        $respondent = User::find($respondent_id);
        Mail::to($client->email)->send(new DateScheduled($client, $respondent, $scheduled_date));
        Mail::to($respondent->email)->send(new DateScheduled($respondent, $client, $scheduled_date));

        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }

    public function schedule_change(Request $request)
    {
        $canceled_schedule = InterviewSchedule::find($request->schedule_id);
        $canceled_schedule->schedule_status_id = ScheduleStatus::getCancelId();
        $canceled_schedule->save();
        
        $schedule = new InterviewSchedule;
        $schedule->schedule_status_id = ScheduleStatus::getPendingId();
        $schedule->schedule = $request->schedule;
        $schedule->chat_id = $request->chatRoomId;
        $schedule->save();
        
        $chat_record = new ChatRecord;
        $chat_record->chat_id = $request->chatRoomId;
        $chat_record->user_id = Role::getBotId();
        $chat_record->comment = "相談日程は " . $schedule->schedule->format('Y/m/d H:i') . " に変更されました。";
        $chat_record->save();
        
        // 両者にメール
        $scheduled_date = $schedule->schedule->format('Y/m/d H:i');
        $old_schedule_date = $canceled_schedule->schedule->format('Y/m/d H:i');
        $client_id = Chat::find($request->chatRoomId)->client_user_id;
        $client = User::find($client_id);
        $respondent_id = Chat::find($request->chatRoomId)->respondent_user_id;
        $respondent = User::find($respondent_id);
        Mail::to($client->email)->send(new ChangedSchedule($client, $respondent, $scheduled_date, $old_schedule_date));
        Mail::to($respondent->email)->send(new ChangedSchedule($respondent, $client, $scheduled_date, $old_schedule_date));


        return redirect(route('chat.index', ['chat_id' => $request->chatRoomId]));
    }

    public function schedule_cancel(Request $request, $chat_id)
    {
        $interviewSchedule = InterviewSchedule::find($request->interview_schedule_id);
        $interviewSchedule->schedule_status_id = ScheduleStatus::getCancelId();
        $interviewSchedule->save();

        $chat_record = new ChatRecord;
        $chat_record->chat_id = $request->chatRoomId;
        $chat_record->user_id = Role::getBotId();
        $chat_record->comment = "相談日程はキャンセルされました。";
        $chat_record->save();

        $ticket = Ticket::where('user_id', Auth::id())->where('chat_id', $chat_id)->where('ticket_status_id', TicketStatus::getUsingId())->first();
        $ticket->chat_id = null;
        $ticket->ticket_status_id = TicketStatus::getPendingId();
        $ticket->save();

        return redirect(route('chat.index', ['chat_id' => $chat_id]));
    }

    public function post_review(Request $request)
    {
        $validated = $request->validate([
            'calling_id' => 'required',
            'user_id' => 'required',
            'is_satisfied' => 'required',
            'is_respondent' => 'required',
        ]);
        CallingEvaluation::create([
            'calling_id' => $request->calling_id,
            'user_id' => $request->user_id,
            'is_satisfied' => $request->boolean('is_satisfied'),
            'comment' => $request->review_comment,
            'is_respondent' => $request->is_respondent,
        ]);
        return redirect(route('chat.index', ['chat_id' => $request->chat_id]));
    }

    public function exit_chat(Request $request)
    {
        $ticket = Ticket::where('user_id', Auth::id())->where('chat_id', $request->chat_id)->where('ticket_status_id', TicketStatus::getUsingId())->first();
        if ($ticket) {
            $ticket->chat_id = null;
            $ticket->ticket_status_id = TicketStatus::getPendingId();
            $ticket->save();
        }

        $chat = Chat::find($request->chat_id);
        $chat->is_finished       = ChatStatus::getIsFinishedId();
        $chat->save();

        $sender = User::find(Auth::id());
        if (Auth::id() === $chat->client_user_id) {
            $receiver_id = $chat->respondent_user_id;
        } else {
            $receiver_id = $chat->client_user_id;
        }
        $receiver = User::find($receiver_id);
        Mail::to($sender->email)->send(new ExitedChat($sender, $receiver));
        Mail::to($receiver->email)->send(new PartnerExitedChat($receiver, $sender));

        if ($request->isClientChat) {
            return redirect()->route('chat.client_chat_list');
        } else {
            return redirect()->route('chat.respondent_chat_list');
        }
    }
}
