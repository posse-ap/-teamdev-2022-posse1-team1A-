<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerEnteredCall extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($caller, $receiver, $chat_id)
    {
        $this->caller = $caller;
        $this->receiver = $receiver;
        $this->chat_id = $chat_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.partner_entered_call')
                ->subject($this->caller->nickname . 'さんが通話に参加されました【Anovey】')
                ->with(['caller' => $this->caller])
                ->with(['receiver' => $this->receiver])
                ->with(['chat_id' => $this->chat_id]);
    }
}
