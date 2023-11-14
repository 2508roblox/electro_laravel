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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-6">
                <h1 class="text-center">My Orders</h1>
            </div>
            <div class="mb-16 wishlist-table">
                <form class="mb-4" action="#" method="post">
                    <div class="table-responsive">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>

                                    <th class="product-name">#ID</th>
                                    <th class="product-price">Date</th>
                                    <th class="product-Stock w-lg-15">Total Amount</th>
                                    <th class="product-Stock w-lg-15">Items</th>
                                    <th class="product-Stock w-lg-15">Method</th>
                                    <th class="product-Stock w-lg-15">Status</th>
                                    <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orders as $item)

                                <tr>

                                    <td data-title="Product">
                                        <a href="#" class="text-gray-90">#{{ $item['ID'] }}</a>
                                    </td>
                                    <td data-title="Unit Price">
                                        <span class="">{{ $item['Date'] }}</span>
                                    </td>
                                    <td data-title="Stock Status">
                                        <!-- Stock Status -->
                                     <span>${{ $item['Total Price'] }}</span>
                                    </td>
                                    <td data-title="Stock Status">
                                        <!-- Stock Status -->
                                        <span>{{ $item['Total Quantity'] }}</span>
                                        <!-- End Stock Status -->
                                    </td>
                                    <td data-title="Stock Method">
                                        <!-- Stock Status -->
                                        <span>{{ $item['Date'] }}</span>
                                        <!-- End Stock Status -->
                                    </td>
                                    <td data-title="Stock">
                                        <!-- Stock Status -->
                                        @if ($item['Status'] =='pending' )
                                        <h1 class=" p-2 badge badge-warning text-white">{{ $item['Status'] }}</h1>

                                        @elseif ($item['Status'] =='confirm' || $item['Status'] =='paid' )

                                        <h1 class=" p-2 badge badge-success text-white">{{ $item['Status'] }}</h1>

                                        @else
                                        <h1 class=" p-2 badge badge-danger text-white">{{ $item['Status'] }}</h1>

                                        @endif
                                        <!-- End Stock Status -->
                                    </td>
                                    <td>
                                        <a  href="{{route('frontend.order.show', ['id' => $item['ID']])}}" class="btn btn-primary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">View</a>
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
