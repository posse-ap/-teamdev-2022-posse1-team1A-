<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_user_id' => User::find($this->faker->numberBetween(1, User::count()))->id,
            'respondent_user_id' => User::find($this->faker->numberBetween(1, User::count()))->id,
        ];
    }
}
