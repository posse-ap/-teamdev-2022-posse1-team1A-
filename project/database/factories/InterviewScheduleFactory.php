<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Chat;
use App\Models\ScheduleStatus;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InterviewSchedule>
 */
class InterviewScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $schedule = $this->faker->dateTimeThisMonth();
        $today = Carbon::now();
        if($today < $schedule) {
            $schedule_status_id = ScheduleStatus::getFinishedId();
        } elseif($this->faker->numberBetween(0, 1)) {
            $schedule_status_id = ScheduleStatus::getPendingId();
        } else {
            $schedule_status_id = ScheduleStatus::getCancelId();
        }
        return [
            'chat_id' => Chat::find($this->faker->numberBetween(1, Chat::count()))->id,
            'schedule' => $schedule,
            'schedule_status_id' => $schedule_status_id,
        ];
    }
}
