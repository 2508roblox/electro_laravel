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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Laptops &
                                Computers</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                        <!-- List -->
                        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                            <li>
                                <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;"
                                    role="button" data-toggle="collapse" aria-expanded="false"
                                    aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                    Show All Categories
                                </a>

                                <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                    <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                        <!-- Menu List -->
                                        @forelse ($categories as $cate)
                                            <li><a class="dropdown-item"
                                                    href="{{ route('frontend.category.list', ['category_slug' => $cate->slug]) }}">{{ Str::ucfirst($cate->name) }}<span
                                                        class="text-gray-25 font-size-12 font-weight-normal">
                                                        ({{ $cate->totalProducts }})</span></a></li>

                                        @empty
                                        @endforelse

                                        <!-- End Menu List -->
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-current active" href="#">{{ $currentCategory[0]->name }}</a>

                                <ul class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    @forelse ($currentCategory[0]->subCategoriesWithProductCount as $cate)
                                        <li><a class="dropdown-item"
                                                href="{{ route('frontend.category.products', ['category_slug' => $currentCategory[0]->slug, 'sub_slug' => $cate['subCategory']->slug]) }}">{{ $cate['subCategory']->name }}<span
                                                    class="text-gray-25 font-size-12 font-weight-normal">
                                                    ({{ $cate['productCount'] }})</span></a></li>
                                    @empty
                                    @endforelse

                                    <!-- End Menu List -->
                                </ul>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
                        </div>
                        <ul class="list-unstyled">
                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="../shop/single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img1.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="../shop/single-product-fullwidth.html">Notebook Black Spire V Nitro
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
                                        <a href="../shop/single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img3.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="../shop/single-product-fullwidth.html">Notebook Black Spire V Nitro
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
                                        <a href="../shop/single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img5.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="../shop/single-product-fullwidth.html">Tablet Thin EliteBook Revolve
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
                                        <a href="../shop/single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img6.jpg') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="../shop/single-product-fullwidth.html">Notebook Purple
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
                                        <a href="../shop/single-product-fullwidth.html" class="d-block width-75">
                                            <img class="img-fluid" src="{{ asset('client/img/300X300/img10.png') }}"
                                                alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a
                                                href="../shop/single-product-fullwidth.html">Laptop Yoga 21 80JH0035GE
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
                    <div
                        class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                        <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">
                            {{ Str::ucfirst($currentCategory[0]->name) }}</h3>
                    </div>
                    <ul class="row list-unstyled products-group no-gutters mb-6">
                        @forelse ($currentCategory[0]->sub_categories as $item)
                            <li class="col-6 col-md-2gdot4 product-item" >
                                <div class="product-item__outer  " style="height: 214px;">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2">
                                                <a href="{{ route('frontend.category.products', ['category_slug' => $currentCategory[0]->slug, 'sub_slug' => $item->slug]) }}"
                                                    class="d-block text-center"><img class="img-fluid"
                                                    style="
                                                    height: 200px;
                                                    object-fit: contain;
                                                "  src="{{ $item->image ? asset('storage/' . $item->image)   : asset('client/img/300X300/img8.jpg')}}"
                                                        alt="Image Description"></a>
                                            </div>
                                            <h5 class="text-center mb-1 product-item__title"><a
                                                    href="../shop/single-product-fullwidth.html"
                                                    class="font-size-15 text-gray-90">@php
                                                        echo ucwords($item->name);
                                                    @endphp</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <p class="text-danger">*There are no categories to display</p>
                        @endforelse


                    </ul>
                    <!-- Best Sellers -->
                    <div class="mb-6 position-relative">
                        <dv
                            class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Best Sellers</h3>
                        </dv>
                        <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                            data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                            data-arrow-left-classes="fa fa-angle-left right-1"
                            data-arrow-right-classes="fa fa-angle-right right-0"
                            data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img1.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Tablets</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet Air 3 WiFi 64GB
                                                                Gold</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$629,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img2.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Laptops & Computers</a>
                                                        </div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet White EliteBook
                                                                Revolve 810 G2</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$1 299,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img7.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Headphones</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">White Solo 2
                                                                Wireless</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$110,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img1.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Tablets</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet Air 3 WiFi 64GB
                                                                Gold</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$629,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img2.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Laptops & Computers</a>
                                                        </div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet White EliteBook
                                                                Revolve 810 G2</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$1 299,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img7.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Headphones</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">White Solo 2
                                                                Wireless</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$110,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img1.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Tablets</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet Air 3 WiFi 64GB
                                                                Gold</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$629,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img2.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Laptops & Computers</a>
                                                        </div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet White EliteBook
                                                                Revolve 810 G2</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$1 299,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img7.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Headphones</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">White Solo 2
                                                                Wireless</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$110,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Best Sellers -->
                    <!-- Top rated in this category -->
                    <div class="mb-8 position-relative">
                        <dv
                            class="d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                            <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Top rated in this category
                            </h3>
                        </dv>
                        <div class="js-slick-carousel position-static u-slick u-slick--gutters-1 overflow-hidden u-slick-overflow-visble pt-3 pb-3"
                            data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                            data-arrow-left-classes="fa fa-angle-left right-1"
                            data-arrow-right-classes="fa fa-angle-right right-0"
                            data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img8.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Tablets</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet Air 3 WiFi 64GB
                                                                Gold</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$629,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img5.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Laptops & Computers</a>
                                                        </div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet White EliteBook
                                                                Revolve 810 G2</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$1 299,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img4.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Headphones</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">White Solo 2
                                                                Wireless</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$110,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img1.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Tablets</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet Air 3 WiFi 64GB
                                                                Gold</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$629,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img2.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Laptops & Computers</a>
                                                        </div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet White EliteBook
                                                                Revolve 810 G2</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$1 299,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img7.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Headphones</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">White Solo 2
                                                                Wireless</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$110,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="js-slide">
                                <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img1.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Tablets</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet Air 3 WiFi 64GB
                                                                Gold</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$629,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img2.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Laptops & Computers</a>
                                                        </div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">Tablet White EliteBook
                                                                Revolve 810 G2</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$1 299,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner p-md-3 row no-gutters">
                                                <div class="col col-lg-auto product-media-left">
                                                    <a href="../shop/single-product-fullwidth.html"
                                                        class="max-width-150 d-block"><img class="img-fluid"
                                                            src="{{ asset('client/img/150X140/img7.jpg') }}"
                                                            alt="Image Description"></a>
                                                </div>
                                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                    <div class="mb-4">
                                                        <div class="mb-2"><a href="#"
                                                                class="font-size-12 text-gray-5">Headphones</a></div>
                                                        <h5 class="product-item__title"><a
                                                                href="../shop/single-product-fullwidth.html"
                                                                class="text-blue font-weight-bold">White Solo 2
                                                                Wireless</a></h5>
                                                    </div>
                                                    <div class="flex-center-between mb-3">
                                                        <div class="prodcut-price">
                                                            <div class="text-gray-100">$110,00</div>
                                                        </div>
                                                        <div class="d-none d-xl-block prodcut-add-cart">
                                                            <a href="../shop/single-product-fullwidth.html"
                                                                class="btn-add-cart btn-primary transition-3d-hover"><i
                                                                    class="ec ec-add-to-cart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            <a href="../shop/compare.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-compare mr-1 font-size-15"></i>
                                                                Compare</a>
                                                            <a href="../shop/wishlist.html"
                                                                class="text-gray-6 font-size-13"><i
                                                                    class="ec ec-favorites mr-1 font-size-15"></i>
                                                                Wishlist</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Top rated in this category -->
                </div>
            </div>

        </div>
    </main>
@endsection
