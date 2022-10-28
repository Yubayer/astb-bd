<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<div class="swiper productSwiper">
    <div class="swiper-wrapper">
        @foreach($product->images as $imgKey => $image)
        <div class="swiper-slide">
            <img src="/images/product/{{ $image->url }}" class="card-img" alt="{{ $product->hendle }}">
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>