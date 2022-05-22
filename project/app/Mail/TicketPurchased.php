<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketPurchased extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $quantity, $payment)
    {
        $this->client = $client;
        $this->payment = $payment;
        $this->quantity = $quantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.ticket_purchased_mail')
        ->subject('チケットのご購入が完了いたしました【Anovey】')
        ->with(['client' => $this->client])
        ->with(['date' => date("Y-m-d") ])
        ->with(['payment' =>  $this->payment])
        ->with(['quantity' =>  $this->quantity]);
    }
}
