<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PartnerExitedChat extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver, $partner)
    {
        $this->receiver = $receiver;
        $this->partner = $partner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.partner_exited_chat_mail')
                ->subject($this->partner->nickname . 'さんがチャットから退出しました【Anovey】')
                ->with(['receiver' => $this->receiver])
                ->with(['partner' => $this->partner]);
    }
}
