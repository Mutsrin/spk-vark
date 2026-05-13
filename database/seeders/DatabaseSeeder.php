<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'mutsrinalim16@gmail.com'],
            [
                'name' => 'Mutsrin Alim',
                'password' => Hash::make('cumlaude'),
                'is_admin' => true
            ]
        );
    }
}