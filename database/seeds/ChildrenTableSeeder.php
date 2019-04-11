<?php

use App\Child;
use Illuminate\Database\Seeder;

class ChildrenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Child::create([
            'first_name' => 'Pharis',
            'lastname' => 'Ouko',
            'date_of_birth' => '1997-10-12',
            'gender_id' => 1
        ]);
        Child::create([
            'first_name' => 'Ali',
            'lastname' => 'Mohamed',
            'date_of_birth' => '1995-01-03',
            'gender_id' => 1
        ]);
        Child::create([
            'first_name' => 'Susan',
            'lastname' => 'Wanjiku',
            'date_of_birth' => '1995-06-20',
            'gender_id' => 2
        ]);
    }
}
