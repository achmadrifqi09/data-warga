<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'state_name' => 'WNI'
        ]);
        State::create([
            'state_name' => 'WNA'
        ]);
    }
}
