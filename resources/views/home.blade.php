@extends('layout.layout')

@section('content')
@include('inc/_header')
<!-- ========== MAIN CONTENT ========== -->
<script>
    // Mendapatkan data produk dari blade template
    var productss = @json($productss);

    // Menyimpan data produk ke localStorage
    localStorage.setItem('products', JSON.stringify(productss));
</script>
<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 1000;
        opacity: 0.5;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .overlay .loader {
        color: #000000;
        font-size: 5rem;
        font-weight: bold;
    }

    .none_loading {
        display: none;
    }
</style>

<div style="background-color: grey" class="overlay" id="myDiv">
    <i style="color: #fed700" class="loader fas fa-spinner fa-spin"></i>
</div>

<script>
    // Xử lý sự kiện khi trang web bắt đầu tải
    window.addEventListener('load', function() {
        // Ẩn thẻ div overlay
        document.getElementById('myDiv').classList.add('none_loading');
    });

    // Xử lý sự kiện khi trang web hoàn thành tải
    document.addEventListener('DOMContentLoaded', function() {
        // Hiển thị thẻ div overlay
        document.getElementById('myDiv').classList.remove('none_loading');
    });
</script>

<main id="content" role="main">
    @if(session('login') == 'true')
    <script>
    console.log('Thành công');
    function showAlert() {

      Swal.fire({
        title: 'Thông báo',
        text: 'Đăng nhập thành công !!!',
        icon: 'success',
        confirmButtonText: 'OK'
      });
    }
    showAlert()
    window.location.href = '{{ route("home") }}';
  </script>
@else
<script>

  </script>
@endif
    <!-- Slider Section -->
    @include('inc._slider')
    <!-- End Slider Section -->

    <div class="container">
        {{-- <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const socket = io('http://localhost:7000', {
                    transports: ['websocket']
                });

                socket.on('connect', () => {
                    // console.log('Đã kết nối đến máy chủ');
                    socket.emit('chat-message', 'Có người đang truy cập');
                });

                socket.on('disconnect', () => {
                    // console.log('Mất kết nối từ máy chủ');
                });
                socket.on('chat-message', (message) => {
                    // console.log('Nhận tin nhắn từ máy chủ:', message);
                });
            });

        </script> --}}
        <!-- Banner -->
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-xl-0">
                    <a href="{{ url('category/smartwatch') }}" class="d-block">
                        <img class="img-fluid" data-src="{{asset('client/img/47.png')}}" lazy style="" alt="Image Description">
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0">
                    <a href="{{ url('category/speaker') }}" class="d-block">
                        <img class="img-fluid" data-src="{{asset('client/img/49.png')}}" lazy style="" alt="Image Description">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banner -->
        <!-- Categories Carousel -->
        <div class="mb-5">
            <div class="position-relative">
                <div class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1" data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2" data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16" data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20" data-pagi-classes="d-xl-none text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1" data-slides-show="10" data-slides-scroll="1" data-responsive='[{
                              "breakpoint": 1400,
                              "settings": {
                                "slidesToShow": 8
                              }
                            }, {
                                "breakpoint": 1200,
                                "settings": {
                                  "slidesToShow": 6
                                }
                            }, {
                              "breakpoint": 992,
                              "settings": {
                                "slidesToShow": 5
                              }
                            }, {
                              "breakpoint": 768,
                              "settings": {
                                "slidesToShow": 3
                              }
                            }, {
                              "breakpoint": 554,
                              "settings": {
                                "slidesToShow": 2
                              }
                            }]'>
                        @forelse ($categories as $category)
                    <div class="js-slide">
                        <a href="{{route('frontend.category.list', ['category_slug' => $category->slug])}}" class="d-block text-center bg-on-hover width-122 mx-auto">
                            <div class="bg pt-4 rounded-circle-top width-122 height-75">
                                <i class="ec ec-{{$category->slug}} font-size-40"></i>
                            </div>
                            <div class="bg-white px-2 pt-2 width-122">
                                <h6 class="font-weight-semi-bold font-size-14 text-gray-90 mb-0 text-lh-1dot2">@php
                                    echo Str::ucfirst($category->name)
                                    @endphp</h6>
                            </div>
                        </a>
                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
        <!-- End Categories Carousel -->
        <!-- Catch Daily Deals! -->
        <div class="mb-4">
            <!-- Nav nav-pills -->
            <div class="position-relative z-index-2">
                <div class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0 mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Catch Daily Deals!</h3>

                    <ul class="w-100 w-lg-auto nav nav-pills nav-tab-pill nav-tab-pill-fill mb-3 mb-lg-2 pt-3 pt-lg-0 border-top border-color-1 border-lg-top-0 align-items-center font-size-15 font-size-15-lg flex-nowrap flex-lg-wrap overflow-auto overflow-lg-visble pr-0" id="pills-tab-4" role="tablist">
                        <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                            <a class="nav-link rounded-pill active" id="Bpills-one-example1-tab" data-toggle="pill" href="#Bpills-one-example1" role="tab" aria-controls="Bpills-one-example1" aria-selected="true">-80% off</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                            <a class="nav-link rounded-pill" id="Bpills-two-example1-tab" data-toggle="pill" href="#Bpills-two-example1" role="tab" aria-controls="Bpills-two-example1" aria-selected="false">-65%</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                            <a class="nav-link rounded-pill" id="Bpills-three-example1-tab" data-toggle="pill" href="#Bpills-three-example1" role="tab" aria-controls="Bpills-three-example1" aria-selected="false">-45%</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-lg-shrink-1">
                            <a class="nav-link rounded-pill" id="Bpills-four-example1-tab" data-toggle="pill" href="#Bpills-four-example1" role="tab" aria-controls="Bpills-four-example1" aria-selected="false">-25%</a>
                        </li>
                    </ul>

                    {{-- <a class="d-block text-gray-16" href="../shop/product-categories-7-column-full-width.html">Go to Daily Deals Section <i class="ec ec-arrow-right-categproes"></i></a> --}}
                </div>
                <div class="row">
                    <div class="col-md-auto col-md-5 col-xl-4 col-wd-3gdot3 mb-6 mb-md-0">
                        <!-- Deal -->
                        <div class="p-3 border border-width-2 border-primary borders-radius-20 bg-white min-width-370">
                            <div class="d-flex justify-content-between align-items-center m-1 ml-2">
                                <h3 class="font-size-22 mb-0 font-weight-normal text-lh-28">Special Offer</h3>
                                <div class="d-flex align-items-center flex-column justify-content-center bg-primary rounded-pill height-75 width-75 text-lh-1">
                                    <span class="font-size-12">Save</span>
                                    <div class="font-size-20 font-weight-bold">$120</div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/320X300/img1.jpg')}}" alt="Image Description"></a>
                            </div>
                            <h5 class="mb-2 font-size-14 text-center mx-auto text-lh-18"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Game Console Controller + USB 3.0 Cable</a></h5>
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <del class="font-size-18 mr-2 text-gray-2">$99,00</del>
                                <ins class="font-size-30 text-red text-decoration-none">$79,00</ins>
                            </div>
                            <div class="mb-3 mx-2">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="">Availavle: <strong>6</strong></span>
                                    <span class="">Already Sold: <strong>28</strong></span>
                                </div>
                                <div class="rounded-pill bg-gray-3 height-14 position-relative">
                                    <span class="position-absolute left-0 top-0 bottom-0 rounded-pill w-30 bg-primary"></span>
                                </div>
                            </div>
                            <div class="mb-2 mx-2 d-xl-flex align-items-xl-center justify-content-xl-between">
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
                        </div>
                        <!-- End Deal -->
                    </div>
                    <div class="col col-md-7 col-xl-8 col-wd-8gdot7">
                        <!-- Tab Content -->
                        <div class="tab-content u-slick__tab" id="Bpills-tabContent">
                            <div class="tab-pane fade show active" id="Bpills-one-example1" role="tabpanel" aria-labelledby="Bpills-one-example1-tab">
                                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-1 pb-6 px-1" data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Bpills-two-example1" role="tabpanel" aria-labelledby="Bpills-two-example1-tab">
                                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-1 pb-6 px-1" data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Bpills-three-example1" role="tabpanel" aria-labelledby="Bpills-three-example1-tab">
                                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-1 pb-6 px-1" data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Bpills-four-example1" role="tabpanel" aria-labelledby="Bpills-four-example1-tab">
                                <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-1 pb-6 px-1" data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4" data-slides-show="1">
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-slide">
                                        <div class="row products-group no-gutters">
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Camera</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Video Camera 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Ultra Wireless S50 Headphones S50 with Bluetooth</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price d-flex align-items-center flex-wrap position-relative">
                                                                    <ins class="font-size-20 text-red text-decoration-none mr-2">$1999,00</ins>
                                                                    <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2 299,00</del>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Full Color LaserJet Pro M452dn</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item remove-divider-md-lg d-xl-none d-wd-block remove-divider-xl">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">GameConsole Destiny Special Edition</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-xl-3 col-wd-2gdot4 product-item d-md-none d-wd-block remove-divider-wd">
                                                <div class="product-item__outer h-100">
                                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                                        <div class="product-item__body pb-xl-2">
                                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                                            <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Camera C430W 4k Waterproof</a></h5>
                                                            <div class="mb-2">
                                                                <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img8.jpg')}}" alt="Image Description"></a>
                                                            </div>
                                                            <div class="flex-center-between mb-1">
                                                                <div class="prodcut-price">
                                                                    <div class="text-gray-100">$685,00</div>
                                                                </div>
                                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                                    <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-item__footer">
                                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                    </div>
                </div>
            </div>
            <!-- End Nav Pills -->
        </div>
        <!-- End Catch Daily Deals! -->
        <!-- Trending products -->
        <div class="mb-4">
            <div class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Trending products</h3>
                <a class="d-block text-gray-16" href="../shop/product-categories-7-column-full-width.html">Go to Trending products <i class="ec ec-arrow-right-categproes"></i></a>
            </div>
            <div class="js-slick-carousel u-slick overflow-hidden u-slick-overflow-visble pt-3 pb-6 px-1" data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4" data-slides-show="7" data-slides-scroll="1" data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 5
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 3
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 3
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img2.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img3.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img4.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img5.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img6.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img7.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="js-slide products-group">
                    <div class="product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="{{ route("fe.shop") }}" class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="{{ route("fe.shop") }}" class="d-block text-center"><img class="img-fluid" lazy  data-src="{{asset('client/img/212X200/img1.jpg')}}" alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="{{ route("fe.shop") }}" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Trending products -->
        <!-- Full banner -->
        <div class="mb-8">
            <a href="{{ route("fe.shop") }}" class="d-block text-gray-90">
                <div class="" style="background-image: url({{asset('client/img/1400X206/img1.jpg')}});">
                    <div class="space-top-2-md p-4 pt-6 pt-md-8 pt-lg-6 pt-xl-8 pb-lg-4 px-xl-8 px-lg-6">
                        <div class="flex-horizontal-center mt-lg-3 mt-xl-0 overflow-auto overflow-md-visble">
                            <h1 class="text-lh-38 font-size-32 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">SHOP AND <strong>SAVE BIG</strong> ON HOTTEST TABLETS</h1>
                            <div class="ml-5 flex-content-center flex-shrink-0">
                                <div class="bg-primary rounded-lg px-6 py-2">
                                    <em class="font-size-14 font-weight-light">STARTING AT</em>
                                    <div class="font-size-30 font-weight-bold text-lh-1">
                                        <sup class="">$</sup>79<sup class="">99</sup>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- End Full banner -->
        <!-- Laptops & Computers -->

        <!-- End Laptops & Computers -->
        <!-- Smartphones & Tablets -->

        <!-- End Smartphones & Tablets -->
        <!-- Banner -->
     
        <!-- End Banner -->

    </div>
</main>

<!-- ========== END MAIN CONTENT ========== -->



@endsection
