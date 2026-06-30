<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::insert([

            //Admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'phone' => '1101',
                'address' => 'USA',
                'status' => 'active',
                'about' => 'I am the Admin',

            ],

            //Farmer
            [
                'name' => 'Farmer',
                'email' => 'farmer@gmail.com',
                'password' => Hash::make('password'),
                'user_type' => 'farmer',
                'phone' => '1102',
                'address' => 'USA',
                'status' => 'active',
                'about' => 'I am the Agent',

            ],

            //User
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'user_type' => 'user',
                'phone' => '1103',
                'address' => 'UK',
                'status' => 'active',
                'about' => 'I am the User',

            ]




        ]);
    }
}