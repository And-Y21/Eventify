<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name' => 'Andy',
            'email' => 'andy@gmail.com',
            'password' => Hash::make('12345'),
        ])->assignRole('Admin');

        User::firstOrCreate([
            'name' => 'Client User',
            'email' => 'client@gmail.com',
            'password' => Hash::make('12345'),
        ])->assignRole('Cliente');
    }
}
