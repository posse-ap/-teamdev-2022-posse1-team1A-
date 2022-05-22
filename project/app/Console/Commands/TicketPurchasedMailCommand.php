<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;
use App\Mail\TicketPurchased;

class TicketPurchasedMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ticket_purchased_mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'チケットを購入したら送信されるメール';

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
    public function handle($client, $quantity, $ticket_price)
    // public function handle()
    {
        // メールを送信
        // 変数= nickname : 購入日：購入チケット数：購入金額：
        Mail::to('abc@gmail.com')->send(new TicketPurchased($client, $quantity, $ticket_price));
    }
}
