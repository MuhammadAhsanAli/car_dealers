<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CarSeeder;
use Database\Seeders\BodySeeder;
use Database\Seeders\MakeSeeder;
use Database\Seeders\CarImageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //UserSeeder::class,
            //BodySeeder::class,
            //MakeSeeder::class,
            //CarSeeder::class,
            //CarImageSeeder::class
        ]);
    }
}
