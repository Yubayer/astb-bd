<?php

use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->insert([
            'user_id'=>'1',
            'name'=>'Lehanga',
            'handle'=>'lehanga',
            'url'=>'/collection/lehanga',
            'description'=>'Lehanga'
        ]);
    }
}
