<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_title' => fake()->sentence(),
            'news_content' => fake()->realText($maxNbChars = 1000, $indexSize = 2),    
            'news_type' => Arr::random(['DPR RI', 'MK', 'Kemendikbud', 'Menpora', 'Kemenedagri', 'Kemenkum']),    
            'news_image_url' => $this->faker->imageUrl(800, 600),    
            'news_view' => mt_rand(0, 999999999),    
            'author' => fake()->name(),    
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
