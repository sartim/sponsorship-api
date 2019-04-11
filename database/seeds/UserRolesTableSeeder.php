<?php

use App\UserRole;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        UserRole::truncate();

        UserRole::create(['user_id' => 1, 'role_id' => 1]);
        UserRole::create(['user_id' => 2, 'role_id' => 2]);
        UserRole::create(['user_id' => 3, 'role_id' => 2]);
    }
}
