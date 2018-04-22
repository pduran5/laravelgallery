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
            'name' => 'Luke',
            'email' => 'luke@jedi.sw',
            'password' => bcrypt('starkiller')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Leia',
            'email' => 'leia@jedi.sw',
            'password' => bcrypt('skywalker')            
        ]);
    }
}
