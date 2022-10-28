@extends('layouts.frontend.app')

@push('css')
    <link href="{{ asset('css/collection.css') }}" rel="stylesheet">  
@endpush

@section('content')
<div class="card collection rounded-0 bg-light border-0">
    <div class="card-body collection-wrapper">
        <div class="row row-cols-2 row-cols-md-4">
            @foreach($products as $product)
                <div class="col mb-4">
                    <a href="{{ route('product.index', ['handle' => $product->handle]) }}">
                        <div class="card h-100 text-center product-grid rounded-0">
                            @if(count($product->images) > 0)
                                <img src="/images/product/{{ $product->images[0]->url }}" 
                                @foreach($product->images as $img_key=>$image)
                                data-src_{{$img_key+1}}="/images/product/{{ $image->url }}" 
                                @endforeach
                                class="card-img-top rounded-0" alt="...">
                            @endif
                            <div class="card-body text-center collection-des">
                                <h5 class="card-title">{{ Str::of($product->title)->words(4, '...') }}</h5>
                                @if($product->compare_price == null)
                                    <strong class="card-text mb-3">Tk {{$product->price}}</strong>
                                @else
                                    @if($product->price > $product->compare_price)
                                        <strong class="card-text mb-3">
                                            <mark>Tk {{$product->compare_price}}</mark> &nbsp;
                                            <del style="background: yellow;">Tk {{$product->price}}</del>
                                        </strong>
                                    @else
                                        <strong class="card-text mb-3">Tk {{$product->price}}</strong>
                                    @endif
                                @endif

                                <div class="cart-warpper">
                                    <div class="cart-icon">
                                    <form method="POST" action="{{ route('cart.add') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn"><i class="fa-solid fa-cart-shopping"></i></button>
                                    </form>
                                        
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </a>    
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
