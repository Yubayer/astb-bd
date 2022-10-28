<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Images;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $products = [
            ['user_id' => 1, 'collection_id'=> 1, 'title' => 'Lehanga', 'handle' => 'lehanga']
        ];

        $images = [
            ['product_id'=> 1]
        ];

        foreach($products as $product){
            Product::create($product);
        }

        foreach($images as $image){
            Images::create($image);
        }
    }
}
