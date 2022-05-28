<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoppedReception extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $user)
    {
        $this->client = $client;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.stopped_reception')
            ->subject('相談中の'. $this->user->nickname . 'さんとの相談が受付不可能となりました【Anovey】')
            ->with(['client' => $this->client])
            ->with(['user' => $this->user]);
    }
}
