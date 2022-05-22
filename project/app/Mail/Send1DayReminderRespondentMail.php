<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Send1DayReminderRespondentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client_user, $respondent_user, $interview_date)
    {
        $this->client_user = $client_user;
        $this->respondent_user = $respondent_user;
        $this->interview_date = $interview_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.1_day_reminder_respondent')
            ->subject('Anovey【相談受付日の前日となりました】')
            ->with(['client_user' => $this->client_user])
            ->with(['respondent_user' => $this->respondent_user])
            ->with(['interview_date' => $this->interview_date]);
    }
}
