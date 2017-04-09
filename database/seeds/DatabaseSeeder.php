<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	Model::unguard();

		  // $this->call(UserTableSeeder::class);
    	$this->call(AdjustmentTableSeeder::class);
        $this->call(ReactionTableSeeder::class);
        $this->call(VotesTableSeeder::class);

		Model::reguard();
    }
}
