<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_name' => 'fadi',
                'email' => 'fadi@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 'student',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'joy',
                'email' => 'joy@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 'supervisor',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_name' => 'christine',
                'email' => 'christine@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 'head_of_dept',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
