@extends('layout.admin')

@section('content')

<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container container--max--xl">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="app-orders-list.html">Orders</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order #80294</li>
                            </ol>
                        </nav>


                        <h1 class="h3 m-0">Order #000{{$order['ID']}}</h1>
                    </div>

                    <div class="col-auto d-flex"><a href="{{route('admin.order.list')}}" class="btn btn-secondary me-3">Back</a><a  href="{{route('admin.invoice.view', ['id' => $order['ID']])}}" class="ml-2 btn btn-success">View Invoice</a>
                        <a style="margin-left: .7rem" href="{{route('admin.invoice.download', ['id' => $order['ID']])}}" class="btn btn-primary">Download Invoice</a>
                        <a style="  margin-left: 1rem" href="{{route('admin.invoice.mail', ['id' => $order['ID']])}}" class="btn btn-info ">
                            Send mail
                        </a>
                    </div>

                </div>
            </div>
            <div class="sa-page-meta mb-5">
                <div class="sa-page-meta__body">
                    <div class="sa-page-meta__list">
                        <div class="sa-page-meta__item">{{$order['Date']}} at 9:08 pm</div>
                        <div class="sa-page-meta__item">{{$order['Total Quantity']}} items</div>
                        <div class="sa-page-meta__item">Total $@php
                            echo number_format($order['Total Price'])
                        @endphp.00</div>
                        <div class="sa-page-meta__item d-flex align-items-center fs-6"><span class="badge badge-sa-success me-2">{{$order['Method']}}</span><span class="badge
                            @php

                                if ($order['Status'] =='pending') {
                                   echo 'badge-sa-warning';
                                }elseif ($order['Status'] =='confirm' || $order['Status'] =='paid') {
                                    echo 'badge-sa-success';

                                }else {
                                    echo 'badge-sa-danger';

                                }
                            @endphp

                            me-2">{{$order['Status']}}</span></div>

                            <a href="{{route('admin.order.update', ['id' => $order['ID']])}}" class="  rounded-circle">
                                <svg style="fill: green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="20px" height="20px">    <path d="M 15 3 C 8.373 3 3 8.373 3 15 C 3 21.627 8.373 27 15 27 C 21.627 27 27 21.627 27 15 C 27 12.820623 26.409997 10.783138 25.394531 9.0214844 L 14.146484 20.267578 C 13.959484 20.454578 13.705453 20.560547 13.439453 20.560547 C 13.174453 20.560547 12.919422 20.455578 12.732422 20.267578 L 8.2792969 15.814453 C 7.8882969 15.423453 7.8882969 14.791391 8.2792969 14.400391 C 8.6702969 14.009391 9.3023594 14.009391 9.6933594 14.400391 L 13.439453 18.146484 L 24.240234 7.3457031 C 22.039234 4.6907031 18.718 3 15 3 z M 24.240234 7.3457031 C 24.671884 7.8662808 25.053743 8.4300516 25.394531 9.0195312 L 27.707031 6.7070312 C 28.098031 6.3150312 28.098031 5.6839688 27.707031 5.2929688 C 27.316031 4.9019687 26.683969 4.9019688 26.292969 5.2929688 L 24.240234 7.3457031 z"/></svg>
                            </a>
                    </div>
                </div>
            </div>
            <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;}">
                <div class="sa-entity-layout__body">
                    <div class="sa-entity-layout__main">
                        <div class="sa-card-area"><textarea class="sa-card-area__area" rows="2" placeholder="Notes about order"></textarea>
                            <div class="sa-card-area__card"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="mb-0 fs-exact-18 me-4">Items</h2>
                                <div class="text-muted fs-exact-14"><a href="#">Edit items</a></div>
                            </div>
                            <div class="table-responsive">
                                <table class="sa-table">
                                    <tbody>


@php
$subtotal = 0; // Khởi tạo biến subtotal để tính tổng giá trị
$totalShippingCost = 0; // Khởi tạo biến totalShippingCost để tính tổng phí vận chuyển
@endphp
@forelse ($order_items as $item)
<tr>
    <td class="min-w-20x d-flex" style="flex-direction: row">
        <div class="d-flex align-items-center"><img
            src="{{ $item->image ? asset('storage/' . $item->image) : asset('client/img/300X300/img6.jpg' )}}"
        class="me-4" width="40" height="40" alt="" /><a href="app-product.html" class="text-reset">@php
            echo ucwords($item->product_name) . '|' .$item->sku_code ;


        @endphp


    </a>


        <div class="" style="background: #{{$item->color_code}}; margin-left: 1rem; border-radius:100% ; height: 10px; width:10px;"></div>
    </div>
    </td>
    <td class="text-end">
        <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">{{ number_format($item['product_price']    ) }}</span><span class="sa-price__decimal">.00</span></div>
    </td>
    <td class="text-end" style="width: 100px">× {{ $item['quantity'] }}</td>
    <td class="text-end">
        <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">
            ${{ number_format($item['product_price'] * $item['quantity']) }}
        </span><span class="sa-price__decimal"></span></div>
    </td>
</tr>
@php
$subtotal += $item['product_price'] * $item['quantity']; // Tính tổng giá trị của mỗi mục và cộng vào subtotal
$totalShippingCost += 0.01 * ($item['product_price'] * $item['quantity']); // Cộng tổng phí vận chuyển của mỗi mục vào totalShippingCost
@endphp
@empty

@endforelse


                                    </tbody>
                                    <tbody class="sa-table__group">
                                        <tr>
                                            <td colSpan="3">Subtotal</td>
                                            <td class="text-end">
                                                <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">{{number_format($subtotal)}}</span><span class="sa-price__decimal">.00</span></div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colSpan="3">Shipping
                                                <div class="text-muted fs-exact-13">via FedEx International</div>
                                            </td>
                                            <td class="text-end">
                                                <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">{{$totalShippingCost}}</span><span class="sa-price__decimal"></span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colSpan="3">Discount</td>
                                            <td class="text-end">
                                                <div class="sa-price"><span class="sa-price__symbol">- $</span><span class="sa-price__integer">0</span><span class="sa-price__decimal">.00</span></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colSpan="3">Total</td>
                                            <td class="text-end">
                                                <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">{{number_format($subtotal + $totalShippingCost)}}</span><span class="sa-price__decimal">.00</span></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="mb-0 fs-exact-18 me-4">Transactions</h2>
                                <div class="text-muted fs-exact-14"><a href="#">Add transaction</a></div>
                            </div>
                            <div class="table-responsive">
                                <table class="sa-table text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>Payment
                                                <div class="text-muted fs-exact-13">via PayPal</div>
                                            </td>
                                            <td>October 7, 2020</td>
                                            <td class="text-end">
                                                <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">2,000</span><span class="sa-price__decimal">.00</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payment
                                                <div class="text-muted fs-exact-13">from account balance</div>
                                            </td>
                                            <td>November 2, 2020</td>
                                            <td class="text-end">
                                                <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">50</span><span class="sa-price__decimal">.00</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Refund
                                                <div class="text-muted fs-exact-13">to PayPal</div>
                                            </td>
                                            <td>December 10, 2020</td>
                                            <td class="text-end text-danger">
                                                <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">-325</span><span class="sa-price__decimal">.00</span></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body px-5 py-4 d-flex align-items-center justify-content-between">
                                <h2 class="mb-0 fs-exact-18 me-4">Balance</h2>
                            </div>
                            <table class="sa-table">
                                <tbody class="sa-table__group">
                                    <tr>
                                        <td>Order Total</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">5,882</span><span class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Return Total</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">0</span><span class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody class="sa-table__group">
                                    <tr>
                                        <td>Paid by customer</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">-80</span><span class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Refunded</td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">0</span><span class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td>Balance <span class="text-muted">(customer owes you)</span></td>
                                        <td class="text-end">
                                            <div class="sa-price"><span class="sa-price__symbol">$</span><span class="sa-price__integer">5,802</span><span class="sa-price__decimal">.00</span></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="sa-entity-layout__sidebar">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                <h2 class="fs-exact-16 mb-0">Customer</h2><a href="#" class="fs-exact-14">Edit</a></div>
                            <div class="card-body d-flex align-items-center pt-4">
                                <div class="sa-symbol sa-symbol--shape--circle sa-symbol--size--lg"><img src="images/customers/customer-1-40x40.jpg" width="40" height="40" alt="" /></div>
                                <div class="ms-3 ps-2">
                                    <div class="fs-exact-14 fw-medium">{{$order['Name']}}</div>
                                    <div class="fs-exact-13 text-muted">This is a first order</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                <h2 class="fs-exact-16 mb-0">Contact person</h2><a href="#" class="fs-exact-14">Edit</a></div>
                            <div class="card-body pt-4 fs-exact-14">
                                <div>{{$order['Name']}}</div>
                                <div class="mt-1"><a href="#"> {{$order_data->email}}</a></div>
                                <div class="text-muted mt-1">+98 {{$order_data->phone}}</div>
                            </div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                <h2 class="fs-exact-16 mb-0">Shipping Address</h2><a href="#" class="fs-exact-14">Edit</a></div>
                            <div class="card-body pt-4 fs-exact-14">{{$order['Name']}}<br/>Random Federation<br/>115302, Moscow<br/>ul. Varshavskaya, 15-2-178</div>
                        </div>
                        <div class="card mt-5">
                            <div class="card-body d-flex align-items-center justify-content-between pb-0 pt-4">
                                <h2 class="fs-exact-16 mb-0">Billing Address</h2><a href="#" class="fs-exact-14">Edit</a></div>
                            <div class="card-body pt-4 fs-exact-14">{{$order['Name']}}<br/>Random Federation<br/>115302, Moscow<br/>ul. Varshavskaya, 15-2-178</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
