<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Product;
use App\Collection;
use App\Images;

use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('images')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create() {
        $collections = Collection::all();
        return view('admin.product.create', compact('collections'));
    }

    public function createNew(Request $request) {

        Validator::make($request->all(), [
            'title' => ['required', 'unique:products', 'max:255'],
            'description' => ['required'],
            'price' => ['required'],
            'collection_id' => ['required'],
        ])->validate();
        
        $imgs = $this->imageHandleMultiple($request);

        $newProduct = new Product;

        $newProduct->user_id = $request->user_id;
        $newProduct->collection_id = $request->collection_id;
        $newProduct->title = $request->title;
        $newProduct->handle = Str::slug($request->title);
        $newProduct->url = 'product/'.Str::slug($request->title);
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->compare_price = $request->compare_price;
        $newProduct->buy_price = $request->buy_price;

        $newProduct->save();

        if(count($imgs) > 0){
            foreach($imgs as $img){
                $newImg = new Images;
                $newImg->product_id = $newProduct->id;
                $newImg->url = $img;
                $newImg->save();
            }
        }

        return redirect()->route('admin.product.index');
    }

    private function imageHandleMultiple($request) {
        $images = array();
        if($files = $request->file('images')) {
            foreach($files as $file) {
                $image = $file;
    
                $randomname = Str::random(30);
                $extension  = $image->getClientOriginalExtension();
        
                $imagename = $randomname.'.'.$extension;
        
                // if(!Storage::disk('public')->exists('product'))
                // {
                //     Storage::disk('public')->makeDirectory('product');
                // }
                // $finalImage = Image::make($image)->save('foo');
                // Storage::disk('public')->put('product/'.$imagename, $finalImage);

                $image->move(public_path('/images/product'), $imagename);
        
                $images[] = $imagename;
            }
            return $images;
        } 
    }

    public function edit($handle) {
        $product = Product::where(['handle' => $handle])->first();
        $collections = Collection::all();
        return view('admin.product.edit', compact('product','collections'));
    }

    public function update(Request $request) {

        Validator::make($request->all(), [
            'title' => ['required', 'unique:products', 'max:255'],
            'description' => ['required'],
            'price' => ['required'],
            'collection_id' => ['required'],
        ])->validate();
        
        $imgs = $this->imageHandleMultiple($request);

        $newProduct = Product::find($request->id);
        
        $newProduct->title = $request->title;
        $newProduct->user_id = $request->user_id;
        $newProduct->collection_id = $request->collection_id;
        $newProduct->handle = Str::slug($request->title);
        $newProduct->url = 'product/'.Str::slug($request->title);
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->compare_price = $request->compare_price;
        $newProduct->buy_price = $request->buy_price;

        $newProduct->update();

        if($imgs){
            foreach($imgs as $img){
                $newImg = new Images;
                $newImg->product_id = $newProduct->id;
                $newImg->url = $img;
                $newImg->save();
            }
        }

        return redirect()->route('admin.product.index');
    }

    public function delete(Request $request, $id) {
        $product = Product::where(['id' => $id])->first();
        $images = Images::where('product_id', $id)->get();

        foreach($images as $image){
            unlink(public_path() .  '/images/product/' . $image->url );
        }

        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
