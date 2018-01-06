<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('locations')->insert([
            'name' => 'Tuba'
        ]);   
         DB::table('locations')->insert([
            'name' => 'Havana'
        ]);   
         DB::table('locations')->insert([
            'name' => 'Bambi'
        ]);   
         DB::table('locations')->insert([
            'name' => 'Zeitgeits'
        ]);   
         DB::table('locations')->insert([
            'name' => 'ALEX Paderborn'
        ]);   
         DB::table('locations')->insert([
            'name' => 'Mango'
        ]);   
    }
}
