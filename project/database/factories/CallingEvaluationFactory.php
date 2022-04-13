<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Calling;
use App\Models\Chat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CallingEvaluation>
 */
class CallingEvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $calling_id = Calling::find($this->faker->numberBetween(1, Calling::count()))->id;
        if ($this->faker->numberBetween(0, 1)) {
            $user_id = Chat::find(Calling::find($calling_id)->chat_id)->client_user_id;
            $is_satisfied = true;
        } else {
            $user_id = Chat::find(Calling::find($calling_id)->chat_id)->respondent_user_id;
            $is_satisfied = false;
        }
        if ($this->faker->numberBetween(0, 1)) {
            $is_satisfied = true;
        } else {
            $is_satisfied = false;
        }
        return [
            'calling_id' => $calling_id,
            'user_id' => $user_id,
            'is_satisfied' => $is_satisfied,
            'comment' => $this->faker->realText(40),
        ];
    }
}
