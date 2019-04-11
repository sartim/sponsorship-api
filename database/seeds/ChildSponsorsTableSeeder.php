<?php

use App\ChildSponsor;
use Illuminate\Database\Seeder;

class ChildSponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChildSponsor::truncate();

        ChildSponsor::create([
            'child_id' => 1,
            'sponsor_id' => 1
        ]);
        ChildSponsor::create([
            'child_id' => 2,
            'sponsor_id' => 2
        ]);
        ChildSponsor::create([
            'child_id' => 3,
            'sponsor_id' => 3
        ]);
    }
}
