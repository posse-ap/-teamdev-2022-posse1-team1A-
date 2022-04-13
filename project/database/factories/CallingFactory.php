<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Chat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calling>
 */
class CallingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chat_id' => Chat::find($this->faker->numberBetween(1, Chat::count()))->id,
            'calling_time' => $this->faker->numberBetween(1, 6000),
        ];
    }
}
