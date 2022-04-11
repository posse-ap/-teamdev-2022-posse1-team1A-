<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule_statuses')->insert(
            [
                'name' => 'pending'
            ],
            [
                'name' => 'cancelled'
            ],
            [
                'name' => 'finished'
            ],
        );
    }
}
