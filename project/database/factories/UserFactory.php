<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\AccountStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nickname' => $this->faker->firstKanaName(),
            'icon' => 'img/user-icon.jpeg',
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'company' => $this->faker->company(),
            'department' => '経理部',
            'length_of_service' => '5年',
            'is_search_target' => true,
            'account_status_id' => AccountStatus::getActiveId(),
            'role_id' => Role::getUserId(),
            'password' => Hash::make('password'),
            'peer_id' => Str::random(16),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
