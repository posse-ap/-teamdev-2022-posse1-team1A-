<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Chat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChatRecord>
 */
class ChatRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $chat_id = Chat::find($this->faker->numberBetween(1, Chat::count()))->id;
        if($this->faker->numberBetween(0,1)) {
            $user_id = Chat::find($chat_id)->client_user_id;
        } else {
            $user_id = Chat::find($chat_id)->respondent_user_id;
        }
        return [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'comment' => $this->faker->realText(40, 5),
        ];
    }
}
