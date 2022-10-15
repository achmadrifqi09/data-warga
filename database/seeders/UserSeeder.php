<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Pengurus RW 02',
            'email' => 'tlogomasrw02@gmail.com',
            'password' => bcrypt('Tlogomas88RW02'),
            'remember_token' => Str::random(60),
        ]);

    }
}
