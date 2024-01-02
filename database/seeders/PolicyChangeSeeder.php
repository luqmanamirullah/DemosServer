<?php

namespace Database\Seeders;

use App\Models\PolicyChange;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolicyChange::factory()
            ->count(20)
            ->create();
    }
}
