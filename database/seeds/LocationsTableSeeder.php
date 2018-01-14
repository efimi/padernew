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
            'name' => 'Tuba',
            'lat' => 51.503454,
            'lng' => (-0.119562),
        ]);   
         DB::table('locations')->insert([
            'name' => 'Havana',
            'lat' => 51.503434,
            'lng' => -0.119562,
        ]);   
         DB::table('locations')->insert([
            'name' => 'Bambi',
            'lat' => 51.503154,
            'lng' => -0.112562,
        ]);   
         DB::table('locations')->insert([
            'name' => 'Zeitgeits',
            'lat' => 51.503454,
            'lng' => -0.119462,
        ]);   
         DB::table('locations')->insert([
            'name' => 'ALEX Paderborn',
            'lat' => 51.50323,
            'lng' => -0.119562,
        ]);   
         DB::table('locations')->insert([
            'name' => 'Mango',
            'lat' => 51.503454,
            'lng' => -0.119462,
        ]);   
    }
}
