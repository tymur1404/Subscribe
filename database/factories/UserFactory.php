<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    const ROLE = 'admin';
    const PASSWORD = 'password';
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $now = Carbon::now();
        $subMonthFromNow = $now->copy()->subMonth();
        return [
            'name' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'role' => self::ROLE,
            'email_verified_at' => now(),
            'password' => bcrypt(self::PASSWORD),
            'subscription_id' => null,
            'subscription_activation_date' => $this->faker->dateTimeBetween($subMonthFromNow, $now),
            'remember_token' => Str::random(10),
        ];
    }
}
