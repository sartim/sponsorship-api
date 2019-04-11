<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::truncate();

        Gender::create(['name' => 'MALE']);
        Gender::create(['name' => 'FEMALE']);
        Gender::create(['name' => 'OTHER']);
    }
}
