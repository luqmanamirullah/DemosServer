<?php

namespace Database\Seeders;

use App\Models\PolicyRepeal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyRepealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolicyRepeal::factory()
            ->count(40)
            ->create();
    }
}
