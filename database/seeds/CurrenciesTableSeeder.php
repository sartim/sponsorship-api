<?php

use App\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::truncate();

        Currency::create(['currency' => 'KES']);
        Currency::create(['currency' => 'Dollar']);
    }
}
