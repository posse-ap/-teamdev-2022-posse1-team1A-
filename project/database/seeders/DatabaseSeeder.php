<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            RoleSeeder::class,
            AccountStatusSeeder::class,
            ScheduleStatusSeeder::class,
            TicketStatusSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            ChatSeeder::class,
            ChatRecordSeeder::class,
            CallingSeeder::class,
            CallingEvaluationSeeder::class,
            InterviewScheduleSeeder::class,
            TicketSeeder::class,
            SettlementSeeder::class,
            RewardSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
