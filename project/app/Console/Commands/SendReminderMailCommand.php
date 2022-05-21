<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
//usersテーブル用のモデルファイルを紐づける
use App\Models\User;
use App\Models\ScheduleStatus;
//メール送信用ファサードを紐づける
use Illuminate\Support\Facades\Mail;
use App\Mail\Send3DayReminderClientMail;
use App\Mail\Send3DayReminderRespondentMail;
use App\Mail\Send1DayReminderClientMail;
use App\Mail\Send1DayReminderRespondentMail;
use App\Models\InterviewSchedule;

class SendReminderMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send_reminder_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '通話の日程の3日前と1日前にリマインドメールを送信する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $interview_schedules_3_day = InterviewSchedule::where('schedule_status_id', ScheduleStatus::getPendingId())->whereDate('schedule', date("Y-m-d",strtotime("+3 day")))->get();
        foreach ($interview_schedules_3_day as $interview_schedule) {
            $interview_date = $interview_schedule->schedule;
            $client_user_id = $interview_schedule->chat->client_user_id;
            $client_user = User::find($client_user_id);
            $respondent_user_id = $interview_schedule->chat->respondent_user_id;
            $respondent_user = User::find($respondent_user_id);
            Mail::to(User::find($client_user_id)->email)->send(new Send3DayReminderClientMail($client_user, $respondent_user, $interview_date));
            Mail::to(User::find($respondent_user_id)->email)->send(new Send3DayReminderRespondentMail($client_user, $respondent_user, $interview_date));
        }

        $interview_schedules_1_day = InterviewSchedule::where('schedule_status_id', ScheduleStatus::getPendingId())->whereDate('schedule', date("Y-m-d",strtotime("+1 day")))->get();
        foreach ($interview_schedules_1_day as $interview_schedule) {
            $interview_date = $interview_schedule->schedule;
            $client_user_id = $interview_schedule->chat->client_user_id;
            $client_user = User::find($client_user_id);
            $respondent_user_id = $interview_schedule->chat->respondent_user_id;
            $respondent_user = User::find($respondent_user_id);
            Mail::to(User::find($client_user_id)->email)->send(new Send1DayReminderClientMail($client_user, $respondent_user, $interview_date));
            Mail::to(User::find($respondent_user_id)->email)->send(new Send1DayReminderRespondentMail($client_user, $respondent_user, $interview_date));
        }
    }
}
