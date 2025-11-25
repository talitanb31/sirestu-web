<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'talita@admin.com'], // cek kalau email sudah ada
            [
                'name' => 'Administrator',
                'role' => 'admin',
                'password' => Hash::make('password'), // jangan lupa hash password
            ]
        );
    }
}