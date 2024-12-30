<?php

namespace Database\Factories;

use App\Models\Gateway;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'price' => fake()->numberBetween(100000, 10000000),
            'type' => fake()->randomElement(['deposit', 'withdraw']),
            'status' => fake()->randomElement(['pending', 'completed', 'failed']),
            'moment_tax' => fake()->numberBetween(5, 10),
            'moment_fee' => fake()->numberBetween(5, 10),
            'gateway_id' => Gateway::inRandomOrder()->first()->id,
        ];
    }
}
