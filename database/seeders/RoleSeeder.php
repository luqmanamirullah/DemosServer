<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        DB::table('roles')->insert([
            'id' => 1,
            'role_name' => 'admin',
            'role_desc' => 'can access all CRUD oparations',
            'created_at' => now(),
            'updated_at' => null
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'role_name' => 'user',
            'role_desc' => 'limited access to CRUD operations',
            'created_at' => now(),
            'updated_at' => null
        ]);
    }
}
