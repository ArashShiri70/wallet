<?php

namespace Database\Factories;

use App\Models\Gateway;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gateway>
 */
class GatewayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->state(['name']),
            "api_key" => fake()->password,
            "username" => fake()->userName,
            "password" => fake()->password,
            "transaction_fee_deposit" => fake()->numberBetween(5, 10),
            "transaction_fee_withdraw" => fake()->numberBetween(5, 10),
            "transaction_tax" => fake()->numberBetween(5, 10),
        ];
    }
}
