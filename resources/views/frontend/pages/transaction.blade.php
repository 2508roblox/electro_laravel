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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Yêu thích</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-6">
                <h1 class="text-center">Lịch sử giao dịch</h1>
            </div>
            <div class="mb-16 wishlist-table">
                        <form class="mb-4" action="#" method="post">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">&nbsp;</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($transactions as $transaction)
                                      <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->method }}</td>
                                        <td>
                                          @if ($transaction->status =='cancel' )
                                          <h1 class="p-2 badge badge-danger text-white">{{ $transaction->status }}</h1>
                                          @else
                                          <h1 class="p-2 badge badge-success text-white">{{ $transaction->status }}</h1>
                                          @endif
                                        </td>
                                        <td>
                                          &nbsp;
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
