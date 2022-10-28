<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('roles')->insert([
                'name'=>'Admin',
            ]);
      
            DB::table('roles')->insert([
                'name'=>'Author',
            ]);
        } catch(Exception $e) {
            echo $e;
        }
    }
}
