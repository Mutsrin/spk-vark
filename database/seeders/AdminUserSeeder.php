<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Mutsrin Alim',
            'email' => 'mutsrinalim16@gmail.com',
            'password' => Hash::make('cumlaude'),
            'is_admin' => true,
        ]);
    }
}