@extends('layouts.frontend.app')

@push('css')
<style>
    .cart-image {
        height: 100%;
        object-fit: cover;
        object-position: top;
    }
</style>
@endpush

@section('content')


<div class="row">
  <div class="col-sm-6">
    <div class="card rounded-0">
        <div class="card-header">
            <h5>Shipping Address</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  </div>

<?php
    $cartTotalPrice = 0;
    foreach($cart as $key => $item){
        if($item->product->compare_price == null){
            $cartTotalPrice = $cartTotalPrice + ($item->product->price * $item->quantity);
        } else{
            if($item->product->price > $item->product->compare_price){
                $cartTotalPrice = $cartTotalPrice + ($item->product->compare_price * $item->quantity);
            }else {
                $cartTotalPrice = $cartTotalPrice + ($item->product->price * $item->quantity);
            }
        }
        
    }
?>

  <div class="col-sm-6">
    <div class="card rounded-0 mb-3">
        <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
  
    <div class="card rounded-0">
      <div class="card-body">
        <h5 class="card-title">Cart Details</h5>
        <h4>
            <strong>Total Price: {{ $cartTotalPrice }}</strong>
        </h4>
        <p class="card-text">Cart Items Information</p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($cart as $item)
                    <tr>
                        <th scope="row">{{ $item->product->title }}</th>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            @if($item->product->compare_price == null)
                                    Tk {{$item->product->price}}
                                @else
                                    @if($item->product->price > $item->product->compare_price)
                                        Tk {{$item->product->compare_price}}   
                                    @else
                                        Tk {{$item->product->price}}
                                    @endif
                            @endif
                        </td>
                        <td>
                            @if($item->product->compare_price == null)
                                    Tk {{$item->product->price * $item->quantity }}
                                @else
                                    @if($item->product->price > $item->product->compare_price)
                                        Tk {{$item->product->compare_price * $item->quantity }}   
                                    @else
                                        Tk {{$item->product->price * $item->quantity }}
                                    @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('cart.checkout') }}" class="btn btn-dark rounded-0">Place Order</a>

      </div>
    </div>
  </div>
</div>
@endsection
