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
        @if(count($cart) > 0)
            @foreach($cart as $key => $item)
                <div class="card mb-3 rounded-0">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img class="cart-image" src="/images/product/{{ $item->product->images[0]->url }}" alt="{{ $item->product->title }}" width="100%">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="margin:0;">{{ $item->product->title }}</h5>
                                @if($item->product->compare_price == null)
                                    <strong class="card-text mb-3">Tk {{$item->product->price}}</strong>
                                @else
                                    @if($item->product->price > $item->product->compare_price)
                                        <strong class="card-text mb-3">
                                            <mark>Tk {{$item->product->compare_price}}</mark> &nbsp;
                                            <del style="background: yellow;">Tk {{$item->product->price}}</del>
                                        </strong>
                                    @else
                                        <strong class="card-text mb-3">Tk {{$item->product->price}}</strong>
                                    @endif
                                @endif
                            <form method="POST" action="{{ route('cart.update') }}" class="w-50 mt-2">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">

                                <div class="form-group">
                                    <label for="inputState">Update Quantity</label>
                                    <select id="inputState" class="form-control rounded-0" name="quantity">
                                        @for($i=1; $i<=10; $i++)
                                            <option @if($item->quantity == $i) selected @endif value="{{ $i }}">{{ $i }}</option>   
                                        @endfor
                                    </select>
                                </div>

                                <button type="submit" class="w-100 mt-1 btn btn-info rounded-0">Update</button>
                            </form>
                            
                            @include('component.modals.cartDeleteModal')
                            <button class="btn btn-warning rounded-0 w-50 mt-1" data-toggle="modal" data-target="#cartDeleteModal">Delete</button>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h4>Your Cart is Empty</h4>
            <a href="{{ route('home') }}" class="btn btn-sm btn-info rounded-0">Shopping Now</a>
        @endif
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

        <a href="{{ route('cart.checkout') }}" class="btn btn-dark rounded-0">Checkout</a>

      </div>
    </div>
  </div>
</div>
@endsection
