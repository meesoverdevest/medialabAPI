<?php

use Illuminate\Database\Seeder;

class AdjustmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Adjustment::class, 10)->create()->each(function($u) {
				  $u->reactions()->save(factory(App\Reaction::class)->make());
				});
    }
}
