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
<<<<<<< HEAD
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Wishlist
                            </li>
=======
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Hóa đơn</li>
>>>>>>> f38c5e2da41ee0fb9364d0397a5f781426e115a9
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-6">
                <h1 class="text-center">Hóa đơn</h1>
            </div>
            <div class="mb-16 wishlist-table">
                <form class="mb-4" action="#" method="post">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Tổng giá trị</th>
                                <th scope="col">Số sản phẩm</th>
                                <th scope="col">Phương thức</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thao tác</th>
                              </tr>
                            </thead>

                            <tbody>
                              @forelse ($orders as $item)
                              <tr>

                                <td data-title="ID">
                                  <a href="#" class="text-gray-90">#{{ $item['ID'] }}</a>
                                </td>
                                <td data-title="Date">
                                  <span class="">{{ $item['Date'] }}</span>
                                </td>
                                <td data-title="Total Amount">
                                  <span>${{ $item['Total Price'] }}</span>
                                </td>
                                <td data-title="Items">
                                  <span>{{ $item['Total Quantity'] }}</span>
                                </td>
                                <td data-title="Method">
                                  <span>{{ $item['Method'] }}</span>
                                </td>
                                <td data-title="Status">
                                  @if ($item['Status'] =='pending' )
                                  <h1 class="p-2 badge badge-warning text-white">{{ $item['Status'] }}</h1>
                                  @elseif ($item['Status'] =='confirm' || $item['Status'] =='paid' )
                                  <h1 class="p-2 badge badge-success text-white">{{ $item['Status'] }}</h1>
                                  @else
                                  <h1 class="p-2 badge badge-danger text-white">{{ $item['Status'] }}</h1>
                                  @endif
                                </td>
                                <td>
                                  <a style="border-radius: 10px !important" href="{{route('frontend.order.show', ['id' => $item['ID']])}}" class="btn btn-primary rounded-0   font-weight-normal px-5 px-md-2 px-lg-5 w-100 w-md-auto">
                                    Chi tiết</a>
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
