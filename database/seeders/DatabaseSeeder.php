<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::where('email', 'mutsrinalim16@gmail.com')->delete();

        User::create([
            'name' => 'Mutsrin Alim',
            'email' => 'mutsrinalim16@gmail.com',
            'password' => Hash::make('cumlaude'),
            'is_admin' => 1
        ]);
    }
}