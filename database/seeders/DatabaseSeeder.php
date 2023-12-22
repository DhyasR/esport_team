<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Model::unguard();

        $this->call(
            [
                RoleSeeder::class,
                UserSeeder::class,
                TeamSeeder::class,
                PlayerSeeder::class
            ]
        );

        Model::reguard();
    }
}
