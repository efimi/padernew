<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('matches')->insert([
         	'location_id' => 3,
            'user_id' => 1,
            'created_at' => Carbon::now(),
        ]);
         DB::table('matches')->insert([
         	'location_id' => 3,
            'user_id' => 2,
            'created_at' => Carbon::now(),
        ]);
         DB::table('matches')->insert([
         	'location_id' => 3,
            'user_id' => 3,
            'created_at' => Carbon::now(),
        ]);
         DB::table('matches')->insert([
         	'location_id' => 3,
            'user_id' => 4,
            'created_at' => Carbon::now(),
        ]);
         DB::table('matches')->insert([
         	'location_id' => 5,
            'user_id' => 5,
            'created_at' => Carbon::now(),
        ]);
         DB::table('matches')->insert([
         	'location_id' => 3,
            'user_id' => 6,
            'created_at' => Carbon::now(),
        ]);
	}
}
