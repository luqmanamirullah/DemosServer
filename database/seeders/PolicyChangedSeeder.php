<?php

namespace Database\Seeders;

use App\Models\PolicyChanged;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyChangedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolicyChanged::factory()
            ->count(50)
            ->create();
    }
}
