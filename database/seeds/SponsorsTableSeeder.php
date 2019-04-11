<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sponsor::create([
            'first_name' => 'Scarlet',
            'last_name' => 'Johanson',
            'email' => 'scarlet@mail.com',
            'phone' => '322923424234'
        ]);
        Sponsor::create([
            'first_name' => 'Walter',
            'last_name' => 'Wanyama',
            'email' => 'walter@mail.com',
            'phone' => '239349249324'
        ]);
        Sponsor::create([
            'first_name' => 'Rachel',
            'last_name' => 'Nyambura',
            'email' => 'rachel@mail.com',
            'phone' => '238234823482'
        ]);
    }
}
