@extends('layouts.frontend.app')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/swiper/swiper.css')}}"/>
@endpush

@section('content')
    <div class="row">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            @include('snippets.productSlider')
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card rounded-0">
        <div class="card-body">
            
            <div class="card rounded-0 mb-2">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->title }}</h4>

                    @if($product->compare_price == null)
                        <strong class="card-text mb-3">Tk. {{$product->price}}</strong>
                    @else
                        @if($product->price > $product->compare_price)
                            <strong class="card-text mb-3">
                                <mark>Tk. {{$product->compare_price}}</mark> &nbsp;
                                <del style="background: yellow;">Tk. {{$product->price}}</del>
                            </strong>
                        @else
                            <strong class="card-text mb-3">Tk. {{$product->price}}</strong>
                        @endif
                    @endif
                </div>
            </div>
            
            <div class="card rounded-0 mb-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('cart.add') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="form-group w-50">
                            <label for="inputState">Select Quantity</label>
                            <select id="inputState" class="form-control rounded-0" name="quantity">
                                @for($i=1; $i<=10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>   
                                @endfor
                            </select>
                        </div>

                        <button type="submit" class="w-50 my-3 btn btn-dark rounded-0">Add To Cart</button>
                    </form>
                </div>
            </div>


            <div class="card rounded-0">
                <div class="card-header">
                    <h4>Description</h4>
                </div>
                <div class="card-body">
                <p class="card-text mt-3">{{ $product->description }}</p>
                </div>
            </div>

        </div>
        </div>
    </div>
    </div>

    @if(count($relatedProducts) > 0)
        @include('snippets.relatedProduct')
    @endif

@endsection

@push('js')
<!-- Swiper JS -->
<script src="{{asset('assets/swiper/swiper.js')}}"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".productSwiper", {
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>
@endpush
