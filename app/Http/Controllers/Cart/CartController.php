<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cart;

class CartController extends Controller
{
    public function index(Request $request) {
        $cart = Cart::where('user_ip', $request->ip())
        ->with('product')
        ->latest()
        ->get();

        return view('cart', compact('cart'));
    }

    public function add(Request $request) {
        $existsCart = Cart::where('product_id', $request->id)
            ->where('user_ip', $request->ip())
            ->first();

        if($existsCart){
            $existsCart->increment('quantity', (int)$request->quantity);
        } else {
            $newCart = new Cart;
            $newCart->product_id = $request->id;
            $newCart->user_ip = $request->ip();
            $newCart->quantity = (int)$request->quantity;
            $newCart->save();  
        }

        $cart = Cart::where('user_ip', $request->ip)->latest()->get();
        return redirect()->route('cart.index');
    }


    public function update(Request $request) {
        $cart = Cart::where('id', $request->id)->first();
        $cart->quantity = $request->quantity;
        $cart->update();

        return redirect()->back();
    }

    public function delete(Request $request) {
        Cart::where('id',$request->id)->delete();
        return redirect()->back();
    }

    public function checkout(Request $request) {
        $cart = Cart::where('user_ip', $request->ip())
        ->with('product')
        ->latest()
        ->get();

        return view('checkout', compact('cart'));
    }
}
