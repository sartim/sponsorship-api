<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        Role::truncate();

        Role::create(['name' => 'SUPERUSER']);
        Role::create(['name' => 'ADMIN']);
    }
}
