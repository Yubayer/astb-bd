<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index(Request $request, $handle) {
        $product = Product::with(['user','collection'])->where('handle', $handle)->first();
        $relatedProducts = Product::where(['collection_id' => $product->collection->id])
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(8)
            ->get();

        if($product)
            return view('product', compact('product', 'relatedProducts'));
        else
            return view('home');
    }
}
