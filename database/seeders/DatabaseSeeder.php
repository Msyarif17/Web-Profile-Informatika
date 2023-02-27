<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $iter = [
            MenuSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            PeminatJurusanInformatikaSeeder::class,
            ThemeSeeder::class,
            FooterDefaultSeeder::class,
            
        ];
        $this->call($iter);
    }
}
