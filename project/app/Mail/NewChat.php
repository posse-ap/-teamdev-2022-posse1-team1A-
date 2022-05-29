<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewChat extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($respondent, $client)
    {
        $this->respondent = $respondent;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new_chat')
        ->subject('新しい相談依頼が届いています【Anovey】')
        ->with(['respondent' => $this->respondent])
        ->with(['client' => $this->client]);
    }
}
