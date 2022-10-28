
<style>
    .relatedProducts img.card-img-top {
        width: 100%;
        height: 330px;
        object-fit: cover;
        object-position: top;
    }

    .relatedProducts .card-title {
        font-size: 18px;
        padding: 0;
        margin: 0;
    }

    @media(max-width: 480px){
        .relatedProducts img.card-img-top {
            height: 200px;
        }

        .relatedProducts .card-body{
            padding: 10px;
        }

        .relatedProducts .card-title {
            font-size: 15px;
            padding: 0;
            margin: 0;
        }
    }
</style>


<div class="card relatedProducts my-5">
    <div class="card-header">
        <h4>Related Rroducts</h4>
    </div>
    <div class="card-body">
        <div class="row row-cols-2 row-cols-md-4">
            @foreach($relatedProducts as $product)
                <div class="col mb-4">
                    <a href="{{ route('product.index', ['handle' => $product->handle]) }}">
                        <div class="card h-100">
                            @if(count($product->images) > 0)
                                <img src="/images/product/{{ $product->images[0]->url }}" 
                                @foreach($product->images as $img_key=>$image)
                                data-src_{{$img_key+1}}="/storage/product/{{ $image->url }}" 
                                @endforeach
                                class="card-img-top" alt="...">
                            @endif
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ Str::of($product->title)->words(4, '...') }}</h5>
                                <p class="card-text">TK. {{ $product->price }}</p>
                            </div>
                        </div>
                    </a>    
                </div>
            @endforeach
        </div>
    </div>
</div>