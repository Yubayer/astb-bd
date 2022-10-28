<?php

use Illuminate\Database\Seeder;

use App\Collection;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collections')->delete();

        $collections = [
            ['user_id' => '1', 'name' => 'Lehanga', 'handle' => 'lehanga'],
            ['user_id' => '1', 'name' => 'Three Piece', 'handle' => 'three-piece'],
            ['user_id' => '1', 'name' => 'Scart', 'handle' => 'scart'],
            ['user_id' => '1', 'name' => 'Couple Dress', 'handle' => 'couple-dress'],
            ['user_id' => '1', 'name' => 'Party Dress', 'handle' => 'party-dress'],
        ];

        foreach($collections as $collection){
            Collection::create($collection);
        }
        
    }
}
