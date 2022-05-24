<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DateScheduled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver, $partner, $scheduled_date)
    {
        $this->receiver = $receiver;
        $this->partner = $partner;
        $this->scheduled_date = $scheduled_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.date_scheduled_mail')
                ->subject($this->partner->nickname . 'さんとの相談日時が予約されました【Anovey】')
                ->with(['receiver' => $this->receiver])
                ->with(['partner' => $this->partner])
                ->with(['scheduled_date' => $this->scheduled_date]);
    }
}
