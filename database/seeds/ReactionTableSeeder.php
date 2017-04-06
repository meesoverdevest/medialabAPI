<?php

use Illuminate\Database\Seeder;
use App\Adjustment;

class ReactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$adjustments = Adjustment::take(20)->get();

    	foreach ($adjustments as $a) {
    		$a->reactions()->save(factory(App\Reaction::class)->make());
    	}
    }
}
