<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'shop_name'=>"ASTB-BD",
            'shop_logo'=>'astb.png',
            'email'=>'astb707@gmail.com',
            'phone'=>'01717488688',
          ]);
    }
}
