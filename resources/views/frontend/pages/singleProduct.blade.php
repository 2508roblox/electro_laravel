@extends('layout.layout')

@section('content')
    @include('inc/_header')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="{{ route('frontend.category.list', ['category_slug' => $cate_name->slug]) }}">@php
                                        echo ucwords($cate_name->name);
                                    @endphp</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="{{ route('frontend.category.products', ['category_slug' => $cate_name->slug, 'sub_slug' => $sub_cate_name->slug]) }}">@php
                                        echo ucwords($sub_cate_name->name);
                                    @endphp</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">

                                @php
                                    echo ucwords($product->name);
                                @endphp
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <div class="container">
            <!-- Single Product Body -->
            <div class="mb-xl-14 mb-6">
                <div class="row">
                    <div class="col-md-5 mb-4 mb-md-0">
                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
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

                        <div id="sliderSyncingThumb"
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
                    <div class="col-md-7 mb-md-6 mb-lg-0">
                        <div class="mb-2">
                            <div class="border-bottom mb-3 pb-md-1 pb-3">
                                <a href="{{ route('frontend.category.products', ['category_slug' => $cate_name->slug, 'sub_slug' => $sub_cate_name->slug]) }}"
                                    class="font-size-12 text-gray-5 mb-2 d-inline-block">

                                    @php
                                        echo ucwords($sub_cate_name->name);
                                    @endphp

                                </a>
                                <h2 class="font-size-25 text-lh-1dot2">
                                    @php
                                        echo ucwords($product->name);
                                    @endphp</h2>
                                <div class="mb-2">
                                    <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                        <div class="text-warning mr-2">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <span class="text-secondary font-size-13">(
                                            {{ isset($productComments) ? count($productComments) : '0' }} customer
                                            reviews)</span>
                                    </a>
                                </div>
                                <div class="d-md-flex align-items-center">

                                    <div class="ml-md-3 text-gray-9 font-size-14">Availability:
                                        @isset($product_quantity)


                                        @if ($product_quantity)
                                            <span class="text-green font-weight-bold">{{ $product_quantity[0]->total_quantity }} in stock</span>
                                        @else
                                            <span class="text-red font-weight-bold">Out of Stock</span>
                                        @endif
                                        @endisset


                                    </div>
                                </div>
                            </div>
                            <div class="flex-horizontal-center flex-wrap mb-4">
                                {{-- add wishlidt --}}
                                <form id="addToWishlistForm" action="{{ route('frontend.wishlist.store') }}" method="POST">
                                    @csrf
                                    <input hidden type="text" name="wishlistProductId" value="{{ $product->id }}">
                                    <p style="cursor: pointer" id="addToWishlist"
                                        class="text-gray-6 font-size-13 mr-2 mb-0"><i
                                            class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</p>

                                </form>
                                <form action="{{ route('admin.wishlist.store') }}" method="POST">
                                    @csrf
                                    <p style="cursor: pointer" class="text-gray-6 font-size-13 ml-2 mb-0"><i
                                            class="ec ec-compare mr-1 font-size-15"></i> Compare</p>


                                </form>
                                <script src="{{ asset('client/vendor/jquery/dist/jquery.min.js') }}"></script>
                                <script>
                                    $(document).ready(function() {
                                        $('#addToWishlist').on('click', function() {
                                            $('#addToWishlistForm').submit()
                                        });
                                    });
                                </script>
                            </div>


                            <div class="mb-2">
                                <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                    @php
                                        echo $product->description;
                                    @endphp


                                </ul>
                            </div>
                            <p>Description: {{ $product->small_description }}.</p>
                            {{--  --}}
                            <!-- Hiển thị danh sách variants -->

                            @foreach ($variants as $variant)
                                <div class="d-flex" style="flex-direction: row ">


                                    <div style="max-widtg : 180px; font-size: 1rem ;" class="variant-name">{{ $variant->value }}:
                                    </div>

                                    <div class="variant-values"
                                        style="display: flex;   align-items: start; ">
                                        <!-- Hiển thị danh sách variantValues của mỗi variant -->
                                        @foreach ($variantValues as $variantValue)
                                            @if ($variantValue->variant_id == $variant->id)
                                                <ul class="variant-value">
                                                    <input class="variant-input" id="{{ $variantValue->id }}"
                                                        name="variant{{ $variant->id }}" value="{{ $variantValue->id }}"
                                                        type="radio" style="display: none  ;" />
                                                    <label for="{{ $variantValue->id }}" style="border-radius: 5px; position: relative;"
                                                        class="variant-label">{{ $variantValue->value }}
                                                        <svg width="10px" style="position: absolute; background: #fe7f00; border-radius: 100%; padding: 2px; fill: white; bottom: 0; right: 0;"  enable-background="new 0 0 12 12" viewBox="0 0 12 12" x="0" y="0" class="shopee-svg-icon icon-tick-bold"><g><path d="m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z"></path></g></svg>
                                                    </label>
                                                </ul>
                                                <hr>
                                            @endif
                                        @endforeach
                                    </div>
                                    <style>
                                        .variant-label {
                                            border: 1px solid rgba(0, 0, 0, 0.207);
                                            padding: .2rem .7rem;
                                            cursor: pointer;
                                        }

                                        .variant-label:hover {
                                            color: #fed700;
                                            border-color: #fed700;
                                        }

                                        .variant-value input:checked+.variant-label {
                                            /* Kiểu dáng cho label khi input radio được chọn */
                                            color: #fe7f00;
                                            border-color: #fe8c00;
                                        }
                                    </style>
                                    {{-- change variants --}}

                                    <script>
                                        if (!window.scriptExecuted) {
                                            window.scriptExecuted = true;

                                            document.addEventListener('DOMContentLoaded', function() {
                                                const variantInputs = document.querySelectorAll('.variant-value input');
                                                let selectedValues = [];

                                                variantInputs.forEach(input => {
                                                    input.addEventListener('change', function() {
                                                        const selectedValue = this.value;

                                                        if (this.checked && !selectedValues.includes(selectedValue)) {
                                                            selectedValues.push(
                                                                selectedValue
                                                                ); // Thêm giá trị vào mảng nếu input được chọn và chưa tồn tại trong mảng
                                                        }

                                                        // Loại bỏ các giá trị không được chọn khỏi mảng selectedValues
                                                        selectedValues = selectedValues.filter(value => {
                                                            return Array.from(variantInputs).some(input => input.value ===
                                                                value && input.checked);
                                                        });

                                                        console.log('Các giá trị đã chọn:', selectedValues);
                                                        $.ajax({
                                                            url: '/skus',
                                                            type: 'GET',
                                                            dataType: 'json',
                                                            data: {
                                                                "_token": "{{ csrf_token() }}",
                                                                "data": selectedValues
                                                            },
                                                            success: function(response) {
                                                                console.log(response);
                                                                var data = response;

                                                                // Đặt giá trị giá gốc
                                                                var originalPriceElement = document.getElementById(
                                                                    "originalPrice");
                                                                originalPriceElement.innerText = "$" + data
                                                                    .original_price + ".00";

                                                                // Đặt giá trị giá khuyến mãi (nếu có)
                                                                var promotionPriceElement = document.getElementById(
                                                                    "promotionPrice");
                                                                promotionPriceElement.innerText = data.promotion_price ?
                                                                    "$" + data.promotion_price + ".00" : "";
                                                                var variantQuantityElement = document.getElementById(
                                                                    "variantQuantity");
                                                                var variantQuantity_text = document.getElementById(
                                                                    "variantQuantity_text");
                                                                    variantQuantity_text.innerText =data.quantity;
                                                                //sku text
                                                                var skuElement = document.getElementById(
                                                                    "sku_id");
                                                                    skuElement.innerText = data.sku_code;
                                                                //sku id

                                                                var skuIdElement = document.getElementById(
                                                                    "sku_id_input");
                                                                    skuIdElement.value = data.id;


                                                            },
                                                            error: function(xhr) {
                                                                // Xử lý lỗi nếu có

                                                            }
                                                        });
                                                    });
                                                });
                                            });
                                        }
                                    </script>
                                </div>
                            @endforeach
                            <p><strong>{{ __('sku') }}</strong>:
                                <input type="hidden" value="0" id="sku_id_input">
                            <span id="sku_id">Chọn 1 biến thể</span>
                            </p>
                            <div class="md-3 text-gray-9 font-size-14">Availability:

                               <span class="text-green font-weight-bold" id="variantQuantity_text" >0 </span>
                               <span class="text-green font-weight-bold"  >  in stock</span>


                            </div>

                            <div class="mb-4">
                                <div class="d-flex align-items-baseline">
                                    <ins id="promotionPrice"
                                        class="font-size-36 text-decoration-none text-warning">${{ $product->promotion_price }}.00</ins>

                                    <del class="font-size-20 ml-2 text-gray-6  " id="originalPrice">
                                        {{ $product->promotion_price ? '$' . $product->price . '.00' : '' }}</del>
                                </div>
                            </div>
                            {{-- quantity --}}
                            <input type="number" value="0" hidden id="variantQuantity" name="variant_quantity">
                            {{-- quantity --}}


                            <div class="d-md-flex align-items-end mb-3">
                                <div class="max-width-150 mb-4 mb-md-0">
                                    <h6 class="font-size-14"> {{ __('quantity') }}</h6>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-2 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col">
                                                <input id="quantityInput"
                                                    class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                    type="text" value="1">
                                            </div>
                                            <div class="col-auto pr-1">
                                                <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                    href="javascript:;">
                                                    <small class="fas fa-minus btn-icon__inner"></small>
                                                </a>
                                                <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                    href="javascript:;">
                                                    <small class="fas fa-plus btn-icon__inner"></small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="{{ asset('client/vendor/jquery/dist/jquery.min.js') }}"></script>

                                    <script>
                                        $(document).ready(function() {
                                            $('.js-minus').on('click', function() {
                                                var quantityInput = $('#quantityInput');
                                                var currentValue = quantityInput.val();

                                                if (currentValue == 1) {
                                                    return false;
                                                }

                                                quantityInput.val(parseInt(currentValue) - 1);
                                            });

                                            $('.js-plus').on('click', function() {
                                                // var id_quantity = $('#colorSelector').val();

                                                // var splitValues = id_quantity.split(":");
                                                // var color_id = splitValues[0];
                                                // var quantity = splitValues[1];
                                                // var quantity = splitValues[1];
                                                var quantity = $('#variantQuantity').val();

                                                if ($('#quantityInput').val() == quantity) {
                                                    return false;
                                                }

                                                var quantityInput = $('#quantityInput');
                                                var currentValue = quantityInput.val();

                                                var result = parseInt(currentValue) + 1;
                                                quantityInput.val(result);
                                            });

                                            $('#quantityInput').on('input', function() {
                                                var quantityInput = $(this);
                                                var currentValue = parseInt(quantityInput.val());

                                                // var id_quantity = $('#colorSelector').val();
                                                // var splitValues = id_quantity.split(":");
                                                var quantity = $('#variantQuantity').val();
                                                // set to max quantity if not valid
                                                if (currentValue >= quantity || currentValue < 1) {
                                                    quantityInput.val(quantity);
                                                }
                                            });
                                        });
                                    </script>
                                    <!-- End Quantity -->
                                </div>
                                <div class="ml-md-3">
                                    <a id="addToCartBtn" href="#"
                                        class="btn px-5 btn-primary-dark transition-3d-hover"><i
                                            class="ec ec-add-to-cart mr-2 font-size-20"></i>{{ __('add_to_cart') }}</a>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#addToCartBtn').on('click', function(e) {
                                            e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
                                            // var id_quantity = $('#colorSelector').val();
                                            // var splitValues = id_quantity.split(":");
                                            // var color_id = splitValues[0]; // id của bảng productColor
                                            var sku_id = $('#sku_id_input').val()    // id của bảng productColor
                                            var quantity = $('#quantityInput').val();
                                            var user = {!! json_encode(auth()->user() ? auth()->user()->id : null) !!};
                                            console.log(user)
                                            var product_id = {!! json_encode($product->id) !!};
                                            if (user != null) {
                                                $.ajax({
                                                    url: '/cart/add',
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        "user_id": user,
                                                        "product_id": product_id,
                                                        // "color_id": color_id,
                                                        "sku_id": sku_id,
                                                        "quantity": quantity
                                                    },
                                                    success: function(response) {
                                                        location.href = '/cart';
                                                    },
                                                    error: function(xhr) {

                                                        $('#add_status').text('Chọn loại sản phẩm cần thêm vào giỏ hàng')

                                                    }
                                                });
                                            }

                                        });
                                    });
                                </script>
                            </div>
                            {{-- add message --}}
                            <span id="add_status" style="color: red; "></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product Body -->
            <!-- Single Product Tab -->
            <div class="mb-8">
                <div class="position-relative position-md-static px-md-6">
                    <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                        id="pills-tab-8" role="tablist">
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                            <a class="nav-link active" id="Jpills-one-example1-tab" data-toggle="pill"
                                href="#Jpills-one-example1" role="tab" aria-controls="Jpills-one-example1"
                                aria-selected="true">{{ __('accessories') }}</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                            <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill"
                                href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1"
                                aria-selected="false">{{ __('description') }}</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                            <a class="nav-link" id="Jpills-three-example1-tab" data-toggle="pill"
                                href="#Jpills-three-example1" role="tab" aria-controls="Jpills-three-example1"
                                aria-selected="false">{{ __('specification') }}</a>
                        </li>
                        <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                            <a class="nav-link" id="Jpills-four-example1-tab" data-toggle="pill"
                                href="#Jpills-four-example1" role="tab" aria-controls="Jpills-four-example1"
                                aria-selected="false">{{ __('reviews') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- Tab Content -->
                <div class="borders-radius-17 border p-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                    <div class="tab-content" id="Jpills-tabContent">
                        <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel"
                            aria-labelledby="Jpills-one-example1-tab">
                            <div class="row no-gutters">
                                <div class="col mb-6 mb-md-0">
                                    <ul
                                        class="row list-unstyled products-group no-gutters border-bottom border-md-bottom-0">
                                        <li
                                            class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down border-0">
                                            <div class="product-item__outer h-100">
                                                <div class="remove-prodcut-hover product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2 d-none d-md-block"><a
                                                                href="../shop/product-categories-7-column-full-width.html"
                                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                                        <h5 class="mb-1 product-item__title d-none d-md-block"><a
                                                                href="#" class="text-blue font-weight-bold">Wireless
                                                                Audio System Multiroom 360 degree Full base audio</a></h5>
                                                        <div class="mb-2">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="d-block text-center"><img class="img-fluid"
                                                                    src="{{ asset('client/img/212X200/img1.jpg') }}"
                                                                    alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1 d-none d-md-block">
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">$685,00</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down">
                                            <div class="product-item__outer h-100">
                                                <div
                                                    class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2 d-none d-md-block"><a
                                                                href="../shop/product-categories-7-column-full-width.html"
                                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                                        <h5 class="mb-1 product-item__title d-none d-md-block"><a
                                                                href="#" class="text-blue font-weight-bold">Tablet
                                                                White EliteBook Revolve 810 G2</a></h5>
                                                        <div class="mb-2">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="d-block text-center"><img class="img-fluid"
                                                                    src="{{ asset('client/img/212X200/img2.jpg') }}"
                                                                    alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1 d-none d-md-block">
                                                            <div
                                                                class="prodcut-price d-flex align-items-center position-relative">
                                                                <ins
                                                                    class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                                                <del
                                                                    class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                                                    299,00</del>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li
                                            class="col-4 col-md-4 col-xl-2gdot5 product-item remove-divider-sm-down remove-divider">
                                            <div class="product-item__outer h-100">
                                                <div
                                                    class="remove-prodcut-hover add-accessories product-item__inner px-xl-4 p-3">
                                                    <div class="product-item__body pb-xl-2">
                                                        <div class="mb-2 d-none d-md-block"><a
                                                                href="../shop/product-categories-7-column-full-width.html"
                                                                class="font-size-12 text-gray-5">Speakers</a></div>
                                                        <h5 class="mb-1 product-item__title d-none d-md-block"><a
                                                                href="#" class="text-blue font-weight-bold">Purple
                                                                Solo 2 Wireless</a></h5>
                                                        <div class="mb-2">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="d-block text-center"><img class="img-fluid"
                                                                    src="{{ asset('client/img/212X200/img3.jpg') }}"
                                                                    alt="Image Description"></a>
                                                        </div>
                                                        <div class="flex-center-between mb-1 d-none d-md-block">
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">$685,00</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div
                                        class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="inlineCheckbox1" checked disabled>
                                        <label class="form-check-label mb-1" for="inlineCheckbox1">
                                            <strong>This product: </strong> Ultra Wireless S50 Headphones S50 with Bluetooth
                                            - <span class="text-red font-size-16">$35.00</span>
                                        </label>
                                    </div>
                                    <div
                                        class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                            value="option1" checked>
                                        <label class="form-check-label mb-1 text-blue" for="inlineCheckbox2">
                                            <span class="text-decoration-on cursor-pointer-on">Universal Headphones Case in
                                                Black</span> - <span class="text-red font-size-16">$159.00</span>
                                        </label>
                                    </div>
                                    <div
                                        class="form-check pl-4 pl-md-0 ml-md-4 mb-2 pb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="option2" checked>
                                        <label class="form-check-label mb-1 text-blue" for="inlineCheckbox3">
                                            <span class="text-decoration-on cursor-pointer-on">Headphones USB Wires</span>
                                            - <span class="text-red font-size-16">$50.00</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="mr-xl-15">
                                        <div class="mb-3">
                                            <div class="text-red font-size-26 text-lh-1dot2">$244.00</div>
                                            <div class="text-gray-6">for 3 item(s)</div>
                                        </div>
                                        <a href="#"
                                            class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add
                                            all to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel"
                            aria-labelledby="Jpills-two-example1-tab">
                            <h3 class="font-size-24 mb-3">Perfectly Done</h3>
                            <p>Praesent ornare, ex a interdum consectetur, lectus diam sodales elit, vitae egestas est enim
                                ornare nisl. Nullam in lectus nec sem semper viverra. In lobortis egestas massa. Nam nec
                                massa nisi. Suspendisse potenti. Quisque
                                suscipit vulputate dui quis volutpat. Ut id elit facilisis, feugiat est in, tempus lacus. Ut
                                ultrices dictum metus, a ultricies ex vulputate ac. Ut id cursus tellus, non tempor quam.
                                Morbi porta diam nisi, id finibus nunc
                                tincidunt eu.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="pt-lg-8 pt-xl-10">
                                        <h3 class="font-size-24 mb-3">Wireless</h3>
                                        <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper
                                            facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras
                                            finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                        <h3 class="font-size-24 mb-3">Fresh Design</h3>
                                        <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed.
                                            Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh
                                            augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit,
                                            lobortis elit quis, ullamcorper massa.</p>
                                        <h3 class="font-size-24 mb-3">Fabolous Sound</h3>
                                        <p class="mb-6">Cras rutrum, nibh a sodales accumsan, elit sapien ultrices
                                            sapien, eget semper lectus ex congue elit. Nullam dui elit, fermentum a varius
                                            at, iaculis non dolor. In hac habitasse platea dictumst.</p>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img class="img-fluid mr-n4 mr-lg-n10"
                                        src="{{ asset('client/img/580X580/img1.jpg') }}" alt="Image Description">
                                </div>
                                <div class="col-md-6 text-left">
                                    <img class="img-fluid ml-n4 ml-lg-n10"
                                        src="{{ asset('client/img/580X580/img2.jpg') }}" alt="Image Description">
                                </div>
                                <div class="col-md-6 align-self-center">
                                    <div class="pt-lg-8 pt-xl-10 text-right">
                                        <h3 class="font-size-24 mb-3">Inteligent Bass</h3>
                                        <p class="mb-6">Fusce vitae nibh mi. Integer posuere, libero et ullamcorper
                                            facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras
                                            finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                        <h3 class="font-size-24 mb-3">Battery Life</h3>
                                        <p class="mb-6">Integer bibendum aliquet ipsum, in ultrices enim sodales sed.
                                            Quisque ut urna vitae lacus laoreet malesuada eu at massa. Pellentesque nibh
                                            augue, pellentesque nec dictum vel, pretium a arcu. Duis eu urna suscipit,
                                            lobortis elit quis, ullamcorper massa.</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">



                                <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong>
                                    <span class="sku">FW511948218</span>
                                </li>
                                <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                                <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1">
                                    <strong>{{ __('category') }}:</strong> <a href="#"
                                        class="text-blue">Headphones</a>
                                </li>
                                <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                                <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>Tags:</strong> <a
                                        href="#" class="text-blue">Fast</a>, <a href="#"
                                        class="text-blue">Gaming</a>, <a href="#" class="text-blue">Strong</a></li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"
                            aria-labelledby="Jpills-three-example1-tab">
                            <div class="mx-md-5 pt-1">
                                <div class="table-responsive mb-4">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th class="px-4 px-xl-5 border-top-0">Weight</th>
                                                <td class="border-top-0">7.25kg</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Dimensions</th>
                                                <td>90 x 60 x 90 cm</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Size</th>
                                                <td>One Size Fits all</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">color</th>
                                                <td>Black with Red, White with Gold</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Guarantee</th>
                                                <td>5 years</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h3 class="font-size-18 mb-4">Technical Specifications</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <th class="px-4 px-xl-5 border-top-0">Brand</th>
                                                <td class="border-top-0">Apple</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Item Height</th>
                                                <td>18 Millimeters</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Item Width</th>
                                                <td>31.4 Centimeters</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Screen Size</th>
                                                <td>13 Inches</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Item Weight</th>
                                                <td>1.6 Kg</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Product Dimensions</th>
                                                <td>21.9 x 31.4 x 1.8 cm</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Item model number</th>
                                                <td>MF841HN/A</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Processor Brand</th>
                                                <td>Intel</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Processor Type</th>
                                                <td>Core i5</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Processor Speed</th>
                                                <td>2.9 GHz</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">RAM Size</th>
                                                <td>8 GB</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Hard Drive Size</th>
                                                <td>512 GB</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Hard Disk Technology</th>
                                                <td>Solid State Drive</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Graphics Coprocessor</th>
                                                <td>Intel Integrated Graphics</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Graphics Card Description</th>
                                                <td>Integrated Graphics Card</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Hardware Platform</th>
                                                <td>Mac</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Operating System</th>
                                                <td>Mac OS</td>
                                            </tr>
                                            <tr>
                                                <th class="px-4 px-xl-5">Average Battery Life (in hours)</th>
                                                <td>9</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel"
                            aria-labelledby="Jpills-four-example1-tab">
                            <div class="row mb-8">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <h3 class="font-size-18 mb-6">Based on {{ $reviewCount }} reviews</h3>
                                        <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">{{ $averageStars }}</h2>
                                        <div class="text-lh-1">overall</div>
                                    </div>

                                    <!-- Ratings -->
                                    <ul class="list-unstyled">
                                        <li class="py-1">
                                            <a class="row align-items-center mx-gutters-2 font-size-1"
                                                href="javascript:;">
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="text-warning text-ls-n2 font-size-16"
                                                        style="width: 80px;">
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star "></small>
                                                    </div>
                                                </div>
                                                @if ($ratingCounts->has(5))
                                                    @php
                                                        $rating = ($ratingCounts[5] / $reviewCount) * 100;
                                                    @endphp
                                                @else
                                                    @php
                                                        $rating = 0;
                                                    @endphp
                                                @endif
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width:  {{ $rating }}%;" aria-valuenow="100"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <span class="text-gray-90">

                                                        @if ($ratingCounts->has(5))
                                                            {{ $ratingCounts[5] }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="row align-items-center mx-gutters-2 font-size-1"
                                                href="javascript:;">
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="text-warning text-ls-n2 font-size-16"
                                                        style="width: 80px;">
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                    </div>
                                                </div>
                                                @if ($ratingCounts->has(4))
                                                    @php
                                                        $rating = ($ratingCounts[4] / $reviewCount) * 100;
                                                    @endphp
                                                @else
                                                    @php
                                                        $rating = 0;
                                                    @endphp
                                                @endif
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $rating }}%;" aria-valuenow="53"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <span class="text-gray-90">
                                                        @if ($ratingCounts->has(4))
                                                            {{ $ratingCounts[4] }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="row align-items-center mx-gutters-2 font-size-1"
                                                href="javascript:;">
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="text-warning text-ls-n2 font-size-16"
                                                        style="width: 80px;">
                                                        <small class="fas fa-star"></small>
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                    </div>
                                                </div>
                                                @if ($ratingCounts->has(3))
                                                    @php
                                                        $rating = ($ratingCounts[3] / $reviewCount) * 100;
                                                    @endphp
                                                @else
                                                    @php
                                                        $rating = 0;
                                                    @endphp
                                                @endif
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $rating }}%;" aria-valuenow="20"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <span class="text-gray-90">
                                                        @if ($ratingCounts->has(3))
                                                            {{ $ratingCounts[3] }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="row align-items-center mx-gutters-2 font-size-1"
                                                href="javascript:;">
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="text-warning text-ls-n2 font-size-16"
                                                        style="width: 80px;">
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                    </div>
                                                </div>
                                                @if ($ratingCounts->has(2))
                                                    @php
                                                        $rating = ($ratingCounts[2] / $reviewCount) * 100;
                                                    @endphp
                                                @else
                                                    @php
                                                        $rating = 0;
                                                    @endphp
                                                @endif
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width:{{ $rating }}%;" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <span class="text-muted">
                                                        @if ($ratingCounts->has(2))
                                                            {{ $ratingCounts[2] }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="row align-items-center mx-gutters-2 font-size-1"
                                                href="javascript:;">
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="text-warning text-ls-n2 font-size-16"
                                                        style="width: 80px;">
                                                        <small class="fas fa-star"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                        <small class="far fa-star text-muted"></small>
                                                    </div>
                                                </div>
                                                @if ($ratingCounts->has(1))
                                                    @php
                                                        $rating = ($ratingCounts[1] / $reviewCount) * 100;
                                                    @endphp
                                                @else
                                                    @php
                                                        $rating = 0;
                                                    @endphp
                                                @endif
                                                <div class="col-auto mb-2 mb-md-0">
                                                    <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                        <div class="progress-bar" role="progressbar"
                                                            style="width: {{ $rating }}%;" aria-valuenow="1"
                                                            aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right">
                                                    <span class="text-gray-90">
                                                        @if ($ratingCounts->has(1))
                                                            {{ $ratingCounts[1] }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End Ratings -->
                                </div>
                                <div class="col-md-6">
                                    <h3 class="font-size-18 mb-5">Add a review</h3>
                                    <!-- Form -->
                                    <form class="js-validate" action="{{ route('frontend.product.rating') }}"
                                        method="POST">
                                        @csrf
                                        <div class="row align-items-center mb-4">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="rating" class="form-label mb-0">Your Review</label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="rating">
                                                    <input type="radio" id="star5" name="rating" value="5">
                                                    <label for="star5"></label>
                                                    <input type="radio" id="star4" name="rating" value="4">
                                                    <label for="star4"></label>
                                                    <input type="radio" id="star3" name="rating" value="3">
                                                    <label for="star3"></label>
                                                    <input type="radio" id="star2" name="rating" value="2">
                                                    <label for="star2"></label>
                                                    <input type="radio" id="star1" name="rating" value="1">
                                                    <label for="star1"></label>
                                                </div>
                                            </div>
                                            <style>
                                                .rating {
                                                    direction: rtl;
                                                    unicode-bidi: bidi-override;
                                                }

                                                .rating>input {
                                                    display: none;
                                                }

                                                .rating>label:before {
                                                    content: "\2605";
                                                    margin: 5px;
                                                    font-size: 24px;
                                                    cursor: pointer;
                                                }

                                                .rating>input:checked~label:before {
                                                    color: gold;
                                                }

                                                .text-muted {
                                                    color: #6c757d !important;
                                                }
                                            </style>
                                            <script>
                                                const ratingInputs = document.querySelectorAll('.rating input');

                                                ratingInputs.forEach(input => {
                                                    input.addEventListener('change', function() {
                                                        const selectedRating = parseInt(this.value);

                                                        ratingInputs.forEach(input => {
                                                            const label = input.nextElementSibling;

                                                            if (parseInt(input.value) > selectedRating) {
                                                                label.classList.add('text-muted');
                                                            } else {
                                                                label.classList.remove('text-muted');
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                        <div class="js-form-message form-group mb-3 row">
                                            <div class="col-md-4 col-lg-3">
                                                <label for="descriptionTextarea" class="form-label">Your Review</label>
                                            </div>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea class="form-control" name="content" rows="3" id="descriptionTextarea"
                                                    data-msg="Please enter your message." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="offset-md-4 offset-lg-3 col-auto">
                                                <button type="submit"
                                                    class="btn btn-primary-dark btn-wide transition-3d-hover">Add
                                                    Review</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                            <!-- Review -->
                            @foreach ($productComments as $comment)
                                <div class="border-bottom border-color-1 pb-4 mb-4">
                                    <!-- Review Rating -->
                                    <div
                                        class="d-flex justify-content-between align-items-center text-secondary font-size-1 mb-2">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $comment->rating)
                                                    <small class="fas fa-star"></small>
                                                @else
                                                    <small class="far fa-star text-muted"></small>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <!-- End Review Rating -->

                                    <p class="text-gray-90">{{ $comment->content }}</p>

                                    <!-- Reviewer -->
                                    <div class="mb-2">
                                        <strong>{{ $comment->user->name }}</strong>
                                        <span class="font-size-13 text-gray-23">-
                                            {{ $comment->created_at->format('F j, Y') }}</span>
                                    </div>
                                    <!-- End Reviewer -->
                                </div>
                            @endforeach
                            <!-- End Review -->
                        </div>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Single Product Tab -->
            <!-- Related products -->
            <div class="mb-6">
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
                </div>
                <ul class="row list-unstyled products-group no-gutters">
                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Wireless Audio System Multiroom 360 degree
                                            Full base audio</a></h5>
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset('client/img/212X200/img1.jpg') }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="../shop/single-product-fullwidth.html"
                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                    class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a>
                                    </h5>
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset('client/img/212X200/img2.jpg') }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price d-flex align-items-center position-relative">
                                            <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                            <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                                299,00</del>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="../shop/single-product-fullwidth.html"
                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                    class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Purple Solo 2 Wireless</a></h5>
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset('client/img/212X200/img3.jpg') }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="../shop/single-product-fullwidth.html"
                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                    class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-md-lg">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Smartphone 6S 32GB LTE</a></h5>
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset('client/img/212X200/img4.jpg') }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="../shop/single-product-fullwidth.html"
                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                    class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-xl">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Widescreen NX Mini F1 SMART NX</a></h5>
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset('client/img/212X200/img5.jpg') }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price">
                                            <div class="text-gray-100">$685,00</div>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="../shop/single-product-fullwidth.html"
                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                    class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li
                        class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item remove-divider-wd d-xl-none d-wd-block">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner px-xl-4 p-3">
                                <div class="product-item__body pb-xl-2">
                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html"
                                            class="font-size-12 text-gray-5">Speakers</a></div>
                                    <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html"
                                            class="text-blue font-weight-bold">Tablet White EliteBook Revolve 810 G2</a>
                                    </h5>
                                    <div class="mb-2">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img
                                                class="img-fluid" src="{{ asset('client/img/212X200/img2.jpg') }}"
                                                alt="Image Description"></a>
                                    </div>
                                    <div class="flex-center-between mb-1">
                                        <div class="prodcut-price d-flex align-items-center position-relative">
                                            <ins class="font-size-20 text-red text-decoration-none">$1999,00</ins>
                                            <del class="font-size-12 tex-gray-6 position-absolute bottom-100">$2
                                                299,00</del>
                                        </div>
                                        <div class="d-none d-xl-block prodcut-add-cart">
                                            <a href="../shop/single-product-fullwidth.html"
                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                    class="ec ec-add-to-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item__footer">
                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                        <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i
                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Related products -->

        </div>
    </main>
@endsection
