<div class="advertisement">
    <div class="image-wrapper">
        <img src="{{asset('client/img/blackfriday.png')}}" id="bg" alt="">
        <a href="#" id="buynow" class="btn btn-primary  ">Buy Now</a>
        <button id="closeButton">X</button>
        <div class="price">
            <del class="origin_price">  {{$product->price}}.00$</del>
          <p class="promotion_price"  >  {{$product->promotion_price}}.00$</p>
        </div>
        {{-- countdown --}}
        <div id="countdown" class="mb-2 mx-2 d-xl-flex align-items-xl-center justify-content-xl-between">
            <h6 class="font-size-15 text-gray-2 text-center text-xl-left mb-3 mb-xl-0 max-width-100-xl">Hurry Up! Offer ends in:</h6>
            <div class="js-countdown d-flex justify-content-center" data-end-date="2020/11/30" data-hours-format="%H" data-minutes-format="%M" data-seconds-format="%S">
                <div class="text-lh-1">
                    <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                        <span class="js-cd-hours"></span>
                    </div>
                    <div class="text-gray-2 font-size-12 font-weight-semi-bold text-center">HOURS</div>
                </div>
                <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                <div class="text-lh-1">
                    <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                        <span class="js-cd-minutes"></span>
                    </div>
                    <div class="text-gray-2 font-size-12 font-weight-semi-bold text-center">MINS</div>
                </div>
                <div class="mx-1 pt-1 text-gray-2 font-size-24">:</div>
                <div class="text-lh-1">
                    <div class="text-gray-2 font-size-30 bg-gray-4 py-2 px-2 rounded-sm mb-2">
                        <span class="js-cd-seconds"></span>
                    </div>
                    <div class="text-gray-2 font-size-12 font-weight-semi-bold text-center">SECS</div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">

        </div>
    </div>
    <div class="col-md-5 mb-4 mb-md-0" style="position: absolute;width: 500px;">
        <div class=""
            style="padding-top: 1rem; font-weight: 700; clip-path: polygon(100% 0, 100% 100%, 50% 80%, 0% 100%, 0% 0%); position: absolute; top: 0; right: 5rem; z-index: 100; width: 40px ; height: 80px; background: #fed700">
            <p id="discount_badge" style="transform: rotate(270deg); color: white;">
                - {{ round((($product->price - $product->promotion_price) / $product->price) * 100) }}%
            </p>
        </div>
        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" style="padding: 1rem" data-infinite="true"
            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
            data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
            data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
            data-nav-for="#sliderSyncingThumb">
            @forelse ($images as $image)
                <div class="js-slide">
                    <img style="height:500px; object-fit: contain " class="img-fluid"
                        src="{{ asset('storage/' . $image->image) }}" alt="Image Description">
                </div>
            @empty
            @endforelse
        </div>
        <div id="sliderSyncingThumb" style="display: none;"
            class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
            data-infinite="true" data-slides-show="5" data-is-thumbs="true"
            data-nav-for="#sliderSyncingNav">
            @forelse ($images as $image)
                <div class="js-slide" style="cursor: pointer;">
                    <img style="height: 60px; object-fit: contain" class="img-fluid"
                        src="{{ asset('storage/' . $image->image) }}" alt="Image Description">
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>

<style>
    .advertisement img {
        filter: grayscale(0);
    }

    .advertisement {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 9999;
    }

    .image-wrapper {
        position: relative;
        text-align: center;
    }

    #bg {
        max-width: 100%;
        max-height: 70vh;
        margin: auto;
        display: block;
    }

    .content-wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Căn giữa nội dung bên trong hình ảnh */
        color: #ffffff;
        font-weight: bold;
        /* Các thuộc tính CSS khác cho nội dung bên trong */
    }

    #buynow {
        position: absolute;
        bottom: 20px;
        right: 20px;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5%;
        color: #ffffff;
        background-color: #fed700;
        border: none;
        cursor: pointer;
    }
    #countdown {
        position: absolute;
        bottom: 20px;
        left: 20px;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5%;
        color: #ffffff;
        background-color: #fed800c8;
        border: none;
        cursor: pointer;
    }

    #closeButton {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 20px;
        color: #fff;
        background-color: transparent;
        border: none;
        cursor: pointer;
        z-index: 1000;
    }
    .price {
        position: absolute;
        bottom: 80px;
        right: 20px;
        text-align: end;
        font-size: 20px;
        color: #fff;
        background-color: transparent;
        border: none;
        cursor: pointer;
        z-index: 1000;
    }
    .origin_price {
        font-size: 1.5rem;
        color: red !important;
        background-color: transparent;
        border: none;
        font-weight: bold;
        font-style: italic;
        text-shadow:
        -1px -1px 0 #000, /* Stroke bên trái và trên */
        1px -1px 0 #000, /* Stroke bên phải và trên */
        -1px 1px 0 #000, /* Stroke bên trái và dưới */
        1px 1px 0 #000; /* Stroke bên phải và dưới */
        cursor: pointer;
        z-index: 1000;
    }
    .promotion_price {
        font-size: 3rem;
        color: #fed700 !important;
        background-color: transparent;
        border: none;
        font-weight: bold;
        font-style: italic;
        text-shadow:
        -1px -1px 0 #000, /* Stroke bên trái và trên */
        1px -1px 0 #000, /* Stroke bên phải và trên */
        -1px 1px 0 #000, /* Stroke bên trái và dưới */
        1px 1px 0 #000; /* Stroke bên phải và dưới */
        cursor: pointer;
        z-index: 1000;
    }
</style>
<script>
    var closeButton = document.getElementById('closeButton');
    var advertisement = document.querySelector('.advertisement');

    closeButton.addEventListener('click', function() {
        advertisement.style.display = 'none';
    });
</script>
