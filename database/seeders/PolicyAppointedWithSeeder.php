<?php

namespace Database\Seeders;

use App\Models\PolicyAppointedWith;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicyAppointedWithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PolicyAppointedWith::factory()
            ->count(20)
            ->create();
    }
}
