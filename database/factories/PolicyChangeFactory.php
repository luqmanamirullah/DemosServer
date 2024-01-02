<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PolicyChange>
 */
class PolicyChangeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_id' => Arr::random([1, 2, 3, 4 ,5 ,6 ,7 ,8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]),
            'content' => fake()->sentence(),
            'created_at' => now(),
            'updated_at'=> now(),
        ];
    }
}
