<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->truncate();
        DB::table('rewards')->insert([
            [
                'user_id' => 1,
                'amount_of_payment' => 2400,
                'is_paid' => false,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
            [
                'user_id' => 1,
                'amount_of_payment' => 2400,
                'is_paid' => false,
                'created_at' => new Carbon('-1 months'),
                'updated_at' => new Carbon('-1 months'),
            ],
            [
                'user_id' => 4,
                'amount_of_payment' => 1200,
                'is_paid' => false,
                'created_at' => new Carbon('-1 months'),
                'updated_at' => new Carbon('-1 months'),
            ],
            [
                'user_id' => 1,
                'amount_of_payment' => 2400,
                'is_paid' => true,
                'created_at' => new Carbon('-3 months'),
                'updated_at' => new Carbon('-3 months'),
            ],
        ]);
    }
}
