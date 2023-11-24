@extends('layout.layout')

@section('content')
    @include('inc/_header')
    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Chi tiết</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-6">
                <h1 class="text-center">Chi tiết hóa đơn</h1>
            </div>
            <div class="mb-16 wishlist-table">
                <form class="mb-4" action="#" method="post">
                    <div class="table-responsive">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity w-lg-15">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $orderItem)
                                <tr>
                                    <td class="d-none d-md-table-cell">
                                        <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1"
                                            src="{{ $orderItem->image ? asset('storage/' . $orderItem->image) : asset('client/img/300X300/img6.jpg' )}}"
                                            alt="Image Description"></a>
                                    </td>
                                    <td data-title="Product">
                                        <a href="#" class="text-gray-90">{{ $orderItem->product_name }}</a>
                                    </td>
                                    <td data-title="Price">
                                        <span class="">  ${{ number_format($orderItem->price) }}.00</span>
                                    </td>
                                    <td data-title="Quantity">
                                        <span class="">x{{ $orderItem->quantity }}  </span>
                                    </td>
                                    <td data-title="Total">
                                        <span class="">${{ number_format($orderItem->price * $orderItem->quantity) }}.00</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection
