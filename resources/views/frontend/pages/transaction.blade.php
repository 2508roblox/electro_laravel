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
                <h1 class="text-center">My Transactions</h1>
            </div>
            <div class="mb-16 wishlist-table">
                        <form class="mb-4" action="#" method="post">
                            <div class="table-responsive">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-name">#ID</th>
                                            <th class="product-price">Date</th>
                                            <th class="product-Stock w-lg-15">Amount</th>
                                            <th class="product-Stock w-lg-15">Type</th>
                                            <th class="product-Stock w-lg-15">Method</th>
                                            <th class="product-Stock w-lg-15">Status</th>
                                            <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td class="product-name">{{ $transaction->id }}</td>
                                                <td class="product-price">{{ $transaction->created_at }}</td>
                                                <td class="product-Stock w-lg-15">{{ $transaction->amount }}</td>
                                                <td class="product-Stock w-lg-15">{{ $transaction->type }}</td>
                                                <td class="product-Stock w-lg-15">{{ $transaction->method }}</td>
                                                <td class="product-Stock w-lg-15">

                                                    @if ($transaction->status =='cancle' )
                                                    <h1 class=" p-2 badge badge-danger text-white">{{ $transaction->status  }}</h1>


                                                    @else
                                                    <h1 class=" p-2 badge badge-success text-white">{{ $transaction->status }}</h1>

                                                    @endif
                                                   </td>
                                                <td class="product-subtotal min-width-200-md-lg">&nbsp;</td>
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
