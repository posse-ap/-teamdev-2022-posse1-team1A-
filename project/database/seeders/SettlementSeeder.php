<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Calling;
use App\Models\Product;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settlements')->truncate();
        $data = array();
        for ($i = 1; $i <= Calling::count(); $i++) {
            array_push($data, [
                'paypay_settlement_id' => Str::random(16),
                'user_id' => Calling::find($i)->chat()->client_user_id,
                'product_id' => Product::getTicketId(),
                'quantity' => 1,
                'amount_of_payment' => Product::find(Product::getTicketId())->price * 1,
                'is_paid' => true,
            ]);
        }
        DB::table('settlements')->insert($data);
    }
}
