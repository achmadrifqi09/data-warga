<?php

namespace Database\Seeders;

use App\Models\Neighbourhood;
use App\Models\Religion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GenderSeeder::class,
            StateSeeder::class,
            ReligionSeeder::class,
            StatusSeeder::class,
            NeighbourhoodSeeder::class
        ]);
      
    }
}
