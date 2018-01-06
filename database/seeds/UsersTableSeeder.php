<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => 'Reinhold',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    
         DB::table('users')->insert([
            'name' => 'Carl',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    
         DB::table('users')->insert([
            'name' => 'Mike',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    
         DB::table('users')->insert([
            'name' => 'Rolf',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    
         DB::table('users')->insert([
            'name' => 'Horst',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    
         DB::table('users')->insert([
            'name' => 'Thomas',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    
         DB::table('users')->insert([
            'name' => 'Marie',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);
        DB::table('users')->insert([
            'name' => 'Grunthilde',
            'email' => str_random(10).'@gmail.com',
            'password' => 'hallo',
        ]);    

     }
}
