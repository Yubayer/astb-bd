@extends('layouts.frontend.app')

@section('content')

<style>
    .collection img.card-img-top {
        width: 100%;
        height: 330px;
        object-fit: cover;
        object-position: top;
    }

    .collection .card-title {
        font-size: 18px;
        padding: 0;
        margin: 0;
    }

    .collection a:hover {
        color: inherit;
        text-decoration: none;
    }

    .collection a {
        color: inherit;
        text-decoration: none;
    }

    .collection .card-body{
        position: relative;
    }

    .collection .cart-warpper{
        position: absolute;
        top: -50px;
        left: 0;
        width: 100%;
        background: rgba(0,0,0,.5);
        box-sizing: border-box;
        height: 50px;
        line-height: 52px;
        opacity: 0;
        transition: .3s;
    }

    .collection .cart-icon{

    }

    .product-grid:hover .cart-warpper{
        opacity: 1;
        transition: .3s;
    }

    .collection .fa-solid, .fas {
        font-weight: 900;
        color: #fbff16;
        font-size: 25px;
        box-shadow: 0px 0px 16px 3px #b72727;
    }

    @media(max-width: 480px){
        .collection img.card-img-top {
            height: 200px;
        }

        .collection .card-body{
            padding: 10px;
        }

        .collection .card-title {
            font-size: 15px;
            padding: 0;
            margin: 0;
        }
    }
</style>
    
<div class="card collection rounded-0">
    <div class="card-body">
        <div class="row row-cols-2 row-cols-md-4">
            @foreach($collection->products as $product)
                <div class="col mb-4">
                    <a href="{{ route('product.index', ['handle' => $product->handle]) }}">
                        <div class="card h-100 text-center product-grid">
                            @if(count($product->images) > 0)
                                <img src="/images/product/{{ $product->images[0]->url }}" 
                                @foreach($product->images as $img_key=>$image)
                                data-src_{{$img_key+1}}="/images/product/{{ $image->url }}" 
                                @endforeach
                                class="card-img-top" alt="...">
                            @endif
                            <div class="card-body text-center">
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
