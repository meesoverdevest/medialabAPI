<?php

use Illuminate\Database\Seeder;
use App\Reaction;
use App\Vote;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
    	$reactions = Reaction::all();

    	foreach ($reactions as $a) {
    		$user = App\User::take(1)->get();
    		factory(App\Vote::class)->create([
    			'reaction_id' => $a->id,
    			'user_id' => $user[0]->id
    			]);
    	}
    }
}
