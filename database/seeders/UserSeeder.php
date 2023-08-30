<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'role' => 'Admin',
            'is_email_verified' => '1',
            'images_profile' => 'administrator.jpg',
            'email' => 'marsudi124@gmail.com',
            'password' => Hash::make('rootroot'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'User Test',
            'role' => 'User',
            'is_email_verified' => '1',
            'images_profile' => 'User.jpg',
            'email' => 'carpediemprojects.com@gmail.com',
            'password' => Hash::make('rootroot'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
