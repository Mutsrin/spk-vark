<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Mutsrin Alim',
            'email' => 'mutsrinalim16@gmail.com',
            'password' => bcrypt('cumlaude'),
            'is_admin' => true,
        ]);
    }
}