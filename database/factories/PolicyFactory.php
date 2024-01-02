<?php

namespace Database\Factories;

use App\Models\Policy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Policy>
 */
class PolicyFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'policy_type' => fake()->sentence(),
            'policy_theme' => Arr::random(['Cipta Kerja', 'Desa', 'Pajak', 'Pertambangan', 'Kesehatan', 'Perlindungan Konsumen', 'Ketenagakerjaan', 'Pemilihan Umum']),
            'policy_title' => fake()->sentence(),
            'policy_year' => '2023',
            'policy_number' => fake()->numberBetween(1, 100),
            'policy_file' => 'https://demosserve.000webhostapp.com/storage/files/UU_ex.pdf',
            'policy_source' => fake()->bothify('??.####/??.###, ??? ??.####, ????.?????.??.??:### ???'),
            'policy_entity' => 'Pemerintah Pusat',
            'policy_explanation' => fake()->realText($maxNbChars = 1000, $indexSize = 2),
            'appointed_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
