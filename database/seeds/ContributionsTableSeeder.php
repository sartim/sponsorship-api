<?php

use App\Contribution;
use Illuminate\Database\Seeder;

class ContributionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contribution::truncate();

        Contribution::create([
            'child_id' => 1,
            'sponsor_id' => 1,
            'currency_id' => 1,
            'contribution' => 200000
        ]);
        Contribution::create([
            'child_id' => 1,
            'sponsor_id' => 1,
            'currency_id' => 1,
            'contribution' => 200000
        ]);
    }
}
