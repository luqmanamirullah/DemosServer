<?php

namespace Database\Seeders;

use App\Models\PolicyImpact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolicyImpact::factory()
            ->count(60)
            ->create();
    }
}
