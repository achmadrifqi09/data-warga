<?php

namespace Database\Seeders;

use App\Models\Neighbourhood;
use Illuminate\Database\Seeder;

class NeighbourhoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Neighbourhood::create([
            'neighbourhood_name' => 'RT 1'
        ]);

        Neighbourhood::create([
            'neighbourhood_name' => 'RT 2'
        ]);

        Neighbourhood::create([
            'neighbourhood_name' => 'RT 3'
        ]);

        Neighbourhood::create([
            'neighbourhood_name' => 'RT 4'
        ]);

        Neighbourhood::create([
            'neighbourhood_name' => 'RT 5'
        ]);

        Neighbourhood::create([
            'neighbourhood_name' => 'RT 6'
        ]);
        
    }
}
