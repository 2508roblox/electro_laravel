@extends('layout.layout')

@section('content')
    @include('inc/_header')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('home')}}">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                {{ $sub_category->name }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        <!-- List -->
                        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                            <li>
                                <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;"
                                    role="button" data-toggle="collapse" aria-expanded="false"
                                    aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                     Danh mục
                                </a>

                                <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                    <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @forelse ($categories as $cate)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('frontend.category.list', ['category_slug' => $cate->slug]) }}">{{ Str::ucfirst($cate->name) }}<span
                                                        class="text-gray-25 font-size-12 font-weight-normal">
                                                        ({{ $cate->totalProducts }})
                                                    </span></a></li>

                                        @empty
                                        @endforelse

                                        <!-- End Menu List -->
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <a class="dropdown-current active" href="#">{{ $currentCategory->name }} <span
                                        class="text-gray-25 font-size-12 font-weight-normal">
                                        ({{ $currentCategory['totalProducts'] }})</span></a>

                                <ul class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    @forelse ($currentCategory->subCategoriesWithProductCount as $item)
                                        <li><a class="dropdown-item"
                                                href="{{ route('frontend.category.products', ['category_slug' => $currentCategory->slug, 'sub_slug' => $item['subCategory']->slug]) }}"">@php
                                                    echo ucwords($item['subCategory']->name);
                                                @endphp<span
                                                    class="text-gray-25 font-size-12 font-weight-normal">({{ $item['productCount'] }})</span></a>
                                        </li>
                                    @empty
                                        <p class="text-danger">*There are no categories to display</p>
                                    @endforelse

                                    <!-- End Menu List -->
                                </ul>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                    {{-- filter section --}}
                    <div class="mb-6">
                        <form action="">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Bộ lọc</h3>
                            </div>
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Thương hiệu</h4>

                                <!-- Checkboxes -->


                                @forelse ($brands as $brand)
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="brands[]"
                                                {{ in_array($brand->id, $_GET['brands'] ?? []) ? 'checked' : '' }}
                                                value="{{ $brand->id }}" class="custom-control-input"
                                                id="brandTnf{{ $brand->id }}">
                                            <label class="custom-control-label"
                                                for="brandTnf{{ $brand->id }}">{{ $brand->name }}
                                                <span class="text-gray-25 font-size-12 font-weight-normal">
                                                    {{ $brand->brandWithSubCateProductCount }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                                <!-- End Checkboxes -->

                                <!-- View More - Collapse -->
                                <div class="collapse" id="collapseBrand">

                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="brandMango">
                                            <label class="custom-control-label" for="brandMango">All
                                                <span class="text-gray-25 font-size-12 font-weight-normal">
                                                    ({{ $currentCategory['totalProducts'] }})</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End View More - Collapse -->

                                <!-- Link -->
                                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                    data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false"
                                    aria-controls="collapseBrand">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                                    <span class="link-collapse__default">Show more</span>
                                    <span class="link-collapse__active">Show less</span>
                                </a>
                                <!-- End Link -->
                            </div>

                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Color</h4>

                                <!-- Checkboxes -->
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryTshirt">
                                        <label class="custom-control-label" for="categoryTshirt">Black <span
                                                class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryShoes">
                                        <label class="custom-control-label" for="categoryShoes">Black Leather <span
                                                class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryAccessories">
                                        <label class="custom-control-label" for="categoryAccessories">Black with Red <span
                                                class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryTops">
                                        <label class="custom-control-label" for="categoryTops">Gold <span
                                                class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="categoryBottom">
                                        <label class="custom-control-label" for="categoryBottom">Spacegrey <span
                                                class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></label>
                                    </div>
                                </div>
                                <!-- End Checkboxes -->

                                <!-- View More - Collapse -->
                                <div class="collapse" id="collapseColor">
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="categoryShorts">
                                            <label class="custom-control-label" for="categoryShorts">Turquoise <span
                                                    class="text-gray-25 font-size-12 font-weight-normal">
                                                    (56)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="categoryHats">
                                            <label class="custom-control-label" for="categoryHats">White <span
                                                    class="text-gray-25 font-size-12 font-weight-normal">
                                                    (56)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="categorySocks">
                                            <label class="custom-control-label" for="categorySocks">White with Gold <span
                                                    class="text-gray-25 font-size-12 font-weight-normal">
                                                    (56)</span></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- End View More - Collapse -->

                                <!-- Link -->
                                <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"
                                    data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false"
                                    aria-controls="collapseColor">
                                    <span class="link__icon text-gray-27 bg-white">
                                        <span class="link__icon-inner">+</span>
                                    </span>
                                    <span class="link-collapse__default">Show more</span>
                                    <span class="link-collapse__active">Show less</span>
                                </a>
                                <!-- End Link -->
                            </div>
                            {{-- color filter --}}
                            <div class="range-slider">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                                <!-- Range Slider -->
                                <input class="js-range-slider" type="text"
                                    data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                                    data-type="double" data-grid="false" data-hide-from-to="true" data-prefix="$"
                                    data-min="0" data-max="3456" data-from="0" data-to="3456"
                                    data-result-min="#rangeSliderExample3MinResult"
                                    data-result-max="#rangeSliderExample3MaxResult">
                                <!-- End Range Slider -->
                                <div class="mt-1 text-gray-111 d-flex mb-4">
                                    <span class="mr-0dot5">Price: </span>
                                    <span>$</span>
                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                    <span class="mx-0dot5"> — </span>
                                    <span>$</span>
                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                </div>
                                <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Filter</button>
                            </div>
                        </form>
                    </div>
                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route("fe.shop") }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img1.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="{{ route("fe.shop") }}">Notebook Black Spire V Nitro
                                                VN7-591G</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold">
                                            <del class="font-size-11 text-gray-9 d-block">$2299.00</del>
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$1999.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route("fe.shop") }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img3.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="{{ route("fe.shop") }}">Notebook Black Spire V Nitro
                                                VN7-591G</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            $499.00
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route("fe.shop") }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img5.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="{{ route("fe.shop") }}">Tablet Thin EliteBook Revolve
                                                810 G6</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            $100.00
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route("fe.shop") }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img6.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="{{ route("fe.shop") }}">Notebook Purple
                                                G952VX-T7008T</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold">
                                            <del class="font-size-11 text-gray-9 d-block">$2299.00</del>
                                            <ins class="font-size-15 text-red text-decoration-none d-block">$1999.00</ins>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route("fe.shop") }}" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img10.png') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="{{ route("fe.shop") }}">Laptop Yoga 21 80JH0035GE
                                                W8.1</a></h3>
                                        <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="fas fa-star"></small>
                                            <small class="far fa-star text-muted"></small>
                                        </div>
                                        <div class="font-weight-bold font-size-15">
                                            $1200.00
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="d-block d-md-flex flex-center-between mb-3">
                        <h3 class="font-size-25 mb-2 mb-md-0">{{ Str::ucfirst($sub_category->name) }}</h3>
                        <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>
                    </div>
                    <!-- End shop-control-bar Title -->
                    <!-- Shop-control-bar -->
                    <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                        <div class="d-xl-none">
                            <!-- Account Sidebar Toggle Button -->
                            <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;"
                                role="button" aria-controls="sidebarContent1" aria-haspopup="true"
                                aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                            </a>
                            <!-- End Account Sidebar Toggle Button -->
                        </div>
                        <div class="px-3 d-none d-xl-block">
                            <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill"
                                        href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                        aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-th"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-two-example1-tab" data-toggle="pill"
                                        href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                        aria-selected="false">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-align-justify"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="pills-three-example1-tab" data-toggle="pill"
                                        href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                        aria-selected="true">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-list"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-four-example1-tab" data-toggle="pill"
                                        href="#pills-four-example1" role="tab" aria-controls="pills-four-example1"
                                        aria-selected="true">
                                        <div class="d-md-flex justify-content-md-center align-items-md-center">
                                            <i class="fa fa-th-list"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex">
                            <form id="formFilterOptions" method="get">
                                <!-- Select -->
                                <select id="filterOptions" name="filterOptions"
                                    class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="default" selected>Default sorting</option>
                                    <option value="latest">Sort by latest</option>
                                    <option value="lowest">Sort by price: low to high</option>
                                    <option value="highest">Sort by price: high to low</option>
                                </select>
                                <!-- End Select -->
                            </form>
                            <script src="{{ asset('client/vendor/jquery/dist/jquery.min.js') }}"></script>

                            <script>
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $(document).ready(function() {
                                    $('#filterOptions').on('change', function() {
                                        $('#formFilterOptions').submit()
                                    });
                                });
                            </script>
                            <form method="POST" class="ml-2 d-none d-xl-block">
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-120"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="one" selected>Show 20</option>
                                    <option value="two">Show 40</option>
                                    <option value="three">Show All</option>
                                </select>
                                <!-- End Select -->
                            </form>
                        </div>
                        <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">
                            <form method="post" class="min-width-50 mr-1">
                                <input size="2" min="1" max="3" step="1" type="number"
                                    class="form-control text-center px-2 height-35" value="1">
                            </form> of 3
                            <a class="text-gray-30 font-size-20 ml-2" href="#">→</a>
                        </nav>
                    </div>
                    <!-- End Shop-control-bar -->
                    <!-- Shop Body -->
                    <!-- Tab Content -->
                    {{-- Products section --}}
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 active show" id="pills-one-example1" role="tabpanel"
                            aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                {{-- insert --}}



                                @forelse ($products as $product)
                                    <li class="col-6 col-md-3 col-wd-2gdot4 product-item remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner px-xl-4 p-3">
                                                <div class="product-item__body pb-xl-2"  style="
                                                display: flex;
                                                flex-direction: column;
                                                justify-content: space-between;
                                                height: 288px;
                                            ">
                                                    <div class="mb-2"><a
                                                            href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="font-size-12 text-gray-5">{{ $sub_category->name }}</a>
                                                            <h5 class="mb-1 product-item__title"><a
                                                                href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="text-blue font-weight-bold">@php
                                                                    echo ucwords($product->name);
                                                                @endphp</a>
                                                        </h5>
                                                    </div>

                                                <div class="mb-2" style="position: relative">

                                                        <a href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="d-block text-center"><img class="img-fluid"
                                                                style="height: 160px; object-fit: contain"
                                                                src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('client/img/212X200/img2.jpg') }}"
                                                                alt="Image Description">  @if ($product->total_quantity > 0)
                                                            <div class=""
                                                                style="color: black; font-weight: 700;clip-path: polygon(0 0, 100% 0%, 75% 100%, 0% 100%); position: absolute; bottom: 0; left: -1rem; z-index: 100; width: 70px ; height: 20px; background: #fed700">

                                                                -
                                                                {{ round((($product->price - $product->promotion_price) / $product->price) * 100) }}%
                                                            </div>
                                                        @else
                                                            <div class=""
                                                                style="color: white; font-weight: 700;clip-path: polygon(0 0, 100% 0%, 85% 100%, 0% 100%); position: absolute; bottom: 0; left: -1rem; z-index: 100; width: 140px ; height: 20px; background: red">

                                                                Hết hàng
                                                            </div>
                                                        @endif
                                                    </a>
                                                    </div>
                                                    <div class="flex-center-between mb-1">
                                                        <div class="product-price">
                                                            @if ($product->promotion_price)
                                                            <div class="prodcut-price d-flex align-items-center position-relative mt-3 ">
                                                                <ins class="font-size-20 text-red text-decoration-none">${{ $product->promotion_price }},00</ins>
                                                                <del class="font-size-12 tex-gray-6 position-absolute bottom-100">${{ $product->price }},00</del>
                                                            </div>
                                                        @else
                                                            <div class="prodcut-price">
                                                                <div class="text-gray-100">${{ $product->price }}.00</div>
                                                            </div>
                                                        @endif
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer">
                                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                        <a href="../shop/wishlist.html"
                                                            class="text-gray-6 font-size-13"><i
                                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse


                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                            aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">

                                {{-- insert --}}
                                @forelse ($products as $product)
                                    <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner px-xl-4 p-3">
                                                <div class="product-item__body pb-xl-2">
                                                    <div class="mb-2"><a
                                                            href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="font-size-12 text-gray-5">{{ $sub_category->name }}</a></div>
                                                    <h5 class="mb-1 product-item__title"><a
                                                             href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="text-blue font-weight-bold">@php
                                                                echo ucwords($product->name);
                                                            @endphp</a></h5>
                                                    <div class="mb-2">
                                                        <a  href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="d-block text-center"><img class="img-fluid"
                                                               src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('client/img/212X200/img2.jpg') }}"
                                                                alt="Image Description"></a>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a class="d-inline-flex align-items-center small font-size-14"
                                                            href="#">
                                                            <div class="text-warning mr-2">
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="far fa-star text-muted"></small>
                                                            </div>
                                                            <span class="text-secondary">(40)</span>
                                                        </a>
                                                    </div>
                                                    <ul class="font-size-12 p-0 text-gray-110 mb-4">
                                                       @php
                                                           echo $product->description
                                                       @endphp
                                                    </ul>
                                                    <div class="text-gray-20 mb-2 font-size-12">SKU: FW511948218</div>
                                                    <div class="flex-center-between mb-1">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">${{ $product->price }}.00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a  href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer">
                                                    <div class="border-top pt-2 flex-center-between flex-wrap">
                                                        <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i
                                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                        <a href="../shop/wishlist.html"
                                                            class="text-gray-6 font-size-13"><i
                                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2  " id="pills-three-example1" role="tabpanel"
                            aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view">
                                {{-- insert --}}
                                @forelse ($products as $product)
                                    <li class="product-item remove-divider">
                                        <div class="product-item__outer w-100">
                                            <div class="product-item__inner remove-prodcut-hover py-4 row">
                                                <div class="product-item__header col-6 col-md-4">
                                                    <div class="mb-2">
                                                        <a  href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="d-block text-center"><img class="img-fluid"
                                                            style="height: 200px; object-fit: contain"      src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('client/img/212X200/img2.jpg') }}"
                                                                alt="Image Description"></a>
                                                    </div>
                                                </div>
                                                <div class="product-item__body col-6 col-md-5">
                                                    <div class="pr-lg-10">
                                                        <div class="mb-2"><a
                                                                href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="font-size-12 text-gray-5">{{ $sub_category->name }}</a></div>
                                                        <h5 class="mb-2 product-item__title"><a
                                                                href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="text-blue font-weight-bold">
                                                                @php
                                                                    echo ucwords($product->name);
                                                                @endphp
                                                            </a></h5>
                                                        <div class="prodcut-price mb-2 d-md-none">
                                                            <div class="text-gray-100">${{ $product->price }}.00</div>
                                                        </div>
                                                        <div class="mb-3 d-none d-md-block">
                                                            <a class="d-inline-flex align-items-center small font-size-14"
                                                                href="#">
                                                                <div class="text-warning mr-2">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                                <span class="text-secondary">(40)</span>
                                                            </a>
                                                        </div>
                                                        <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                          @php
                                                              echo $product->description;
                                                          @endphp
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer col-md-3 d-md-block">
                                                    <div class="mb-3">
                                                        <div class="prodcut-price mb-2">
                                                            <div class="text-gray-100">${{ $product->price }}.00</div>
                                                        </div>
                                                        <div class="prodcut-add-cart">
                                                            <a  href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add
                                                                to cart</a>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">
                                                        <a href="../shop/compare.html"
                                                            class="text-gray-6 font-size-13 mx-wd-3"><i
                                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                        <a href="../shop/wishlist.html"
                                                            class="text-gray-6 font-size-13 mx-wd-3"><i
                                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse

                            </ul>
                        </div>
                        <div class="tab-pane fade pt-2" id="pills-four-example1" role="tabpanel"
                            aria-labelledby="pills-four-example1-tab" data-target-group="groups">
                            <ul class="d-block list-unstyled products-group prodcut-list-view-small">
                                @forelse ($products as $product)
                                    <li class="product-item remove-divider">
                                        <div class="product-item__outer w-100">
                                            <div class="product-item__inner remove-prodcut-hover py-4 row">
                                                <div class="product-item__header col-6 col-md-2">
                                                    <div class="mb-2">
                                                        <a  href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                            class="d-block text-center"><img class="img-fluid"
                                                               style="height: 140px; object-fit: cover" src="{{ $product->image_url ? asset('storage/' . $product->image_url) : asset('client/img/212X200/img2.jpg') }}"
                                                                alt="Image Description"></a>
                                                    </div>
                                                </div>
                                                <div class="product-item__body col-6 col-md-7">
                                                    <div class="pr-lg-10">
                                                        <div class="mb-2"><a
                                                                href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="font-size-12 text-gray-5">{{ $sub_category->name }}</a></div>
                                                        <h5 class="mb-2 product-item__title"><a
                                                                 href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="text-blue font-weight-bold">
                                                                @php
                                                                    echo ucwords($product->name);
                                                                @endphp
                                                            </a></h5>
                                                        <div class="prodcut-price d-md-none">
                                                            <div class="text-gray-100">${{ $product->price }}.00</div>
                                                        </div>
                                                        <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                          @php
                                                              echo $product->description;
                                                          @endphp
                                                        </ul>
                                                        <div class="mb-3 d-none d-md-block">
                                                            <a class="d-inline-flex align-items-center small font-size-14"
                                                                href="#">
                                                                <div class="text-warning mr-2">
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="fas fa-star"></small>
                                                                    <small class="far fa-star text-muted"></small>
                                                                </div>
                                                                <span class="text-secondary">(40)</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer col-md-3 d-md-block">
                                                    <div class="mb-2 flex-center-between">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">${{ $product->price }}.00</div>
                                                        </div>
                                                        <div class="prodcut-add-cart">
                                                            <a  href="{{ route('frontend.category.show', ['product_slug' => $product->slug]) }}"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap border-top pt-3">
                                                        <a href="../shop/compare.html"
                                                            class="text-gray-6 font-size-13 mx-wd-3"><i
                                                                class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                        <a href="../shop/wishlist.html"
                                                            class="text-gray-6 font-size-13 mx-wd-3"><i
                                                                class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                @endforelse



                            </ul>
                        </div>
                    </div>
                    <!-- End Tab Content -->
                    <!-- End Shop Body -->
                    <!-- Shop Pagination -->
                    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                        aria-label="Page navigation example">
                        <div class="text-center text-md-left mb-3 mb-md-0">Showing 1–25 of 56 results</div>
                        <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                            <li class="page-item"><a class="page-link current" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                    <!-- End Shop Pagination -->
                </div>
            </div>

        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
