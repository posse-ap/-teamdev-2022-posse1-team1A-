<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\InterviewSchedule;
use App\Models\ScheduleStatus;
use Illuminate\Support\Carbon;

class InterviewScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interview_schedules')->truncate();
        DB::table('interview_schedules')->insert([
            [
                'chat_id' => 1,
                'schedule' => Carbon::tomorrow(),
                'schedule_status_id' => ScheduleStatus::getPendingId(),
            ],
        ]);
        $interview_schedule = InterviewSchedule::factory()
                ->count(20)
                ->create();
    }
}
