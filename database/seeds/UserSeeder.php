<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'role_id'=>1,
            'name'=>'Jobayer',
            'email'=>'jobayer@gmail.com',
            'password'=>bcrypt("11111111"),
          ]);
  
          DB::table('users')->insert([
            'role_id'=>1,
            'name'=>'Ashraful',
            'email'=>'ashraful@gmail.com',
            'password'=>bcrypt('11111111'),
          ]);
    }
}
