<?php

namespace Database\Seeders;

use App\Models\Role;
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
        Role::create(
            [
                'role_name' => 'Admin'
            ]
        );

        Role::create(
            [
                'role_name' => 'Team'
            ]
        );

        Role::create(
            [
                'role_name' => 'Player'
            ]
        );
    }
}
