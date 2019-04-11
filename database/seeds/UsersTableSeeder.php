<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('test');

        User::create(
            [
            'first_name' => 'Super',
            'last_name' => 'User',
            'email' => 'superuser@mail.com',
            'phone' => '0987654321',
            'password' => $password,
            'is_active' => true
            ]
        );

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@mail.com',
            'phone' => '1234567890',
            'password' => $password,
            'is_active' => true
        ]);

        User::create([
            'first_name' => 'Staff',
            'last_name' => 'User',
            'email' => 'staff@mail.com',
            'phone' => '1234567891',
            'password' => $password,
            'is_active' => true
        ]);
    }
}
