<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule_statuses')->truncate();
        DB::table('schedule_statuses')->insert([
            [
                'name' => 'pending'
            ],
            [
                'name' => 'using'
            ],
            [
                'name' => 'used'
            ],
        ]);
    }
}
