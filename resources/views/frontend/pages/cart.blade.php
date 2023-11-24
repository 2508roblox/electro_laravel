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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Trang chủ</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{ __('cart') }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">{{ __('cart') }}</h1>
            </div>
            <div class="mb-10 cart-table">
                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-name">{{ __('cart') }}</th>
                            <th class="product-price">{{ __('product') }}</th>
                            <th class="product-quantity w-lg-15">{{ __('price') }}</th>
                            <th class="product-quantity w-lg-15">Số lượng</th>
                            <th class="product-subtotal">{{ __('total') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($carts as $cart)
                            <tr class="">
                                <td class="text-center">
                                    <a href="{{ route('admin.cart.delete', ['id' => $cart->cart_id]) }}"
                                        class="text-gray-32 font-size-26">×</a>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1"
                                            src="
                                        {{ $cart->product_image ? asset('storage/' . $cart->product_image) : 'client/img/300X300/img6.jpg' }}
                                         "
                                            alt="Image Description"></a>
                                </td>

                                <td data-title="Product">
                                    <a href="#" class="text-gray-90">@php
                                        echo ucwords($cart->product_name);
                                    @endphp </a>
                                    <span style=" "> - (  {{$cart->sku}}   )</span>
                                </td>

                                <td data-title="Price">
                                    @if (isset($cart->promotion_price))
                                        <span class="">${{ number_format($cart->promotion_price) }}.00</span>
                                        <del class="font-size-1 ml-2 text-gray-6  ">
                                            ${{ number_format($cart->original_price) }}.00</del>
                                        <input hidden id="current_price_{{ $cart->cart_id }}" type="number"
                                            value="{{ $cart->promotion_price }}">
                                    @else
                                        <span class="">${{ number_format($cart->original_price) }}.00</span>
                                        <input hidden id="current_price_{{ $cart->cart_id }}" type="number"
                                            value="{{ $cart->original_price }}">
                                    @endif
                                </td>

                                <td data-title="Quantity">
                                    <span class="sr-only">Quantity</span>
                                    <!-- Quantity -->
                                    <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                        <div class="js-quantity row align-items-center">
                                            <div class="col p-0">
                                                <input id="quantityInput{{ $cart->cart_id }}" name="quantity"
                                                    class="ml-5 js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                    type="number" min="1" max="{{ $cart->max_variant_quantity }}"
                                                    value="{{ $cart->quantity }}">
                                            </div>

                                            <style>
                                                input::-webkit-outer-spin-button,
                                                input::-webkit-inner-spin-button {
                                                    -webkit-appearance: none;
                                                    margin: 0;
                                                }

                                                input[type=number] {
                                                    -moz-appearance: textfield;
                                                }
                                            </style>

                                            <div class="col-auto pr-1">
                                                <button style="z-index: 100" value="{{ $cart->cart_id }}"
                                                    onclick="desc_qty({{ $cart->cart_id }}, {{ $cart->max_variant_quantity }})"
                                                    class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0">
                                                    <i value="{{ $cart->cart_id }}"
                                                        onclick="handleSmallClickDesc(event, {{ $cart->cart_id }}, {{ $cart->max_variant_quantity }})"
                                                        class="fas fa-minus btn-icon__inner"></i>
                                                </button>
                                                <button style="z-index: 100" value="{{ $cart->cart_id }}"
                                                    onclick="inc_qty({{ $cart->cart_id }}, {{ $cart->max_variant_quantity }})"
                                                    class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0">
                                                    <i value="{{ $cart->cart_id }}"
                                                        onclick="handleSmallClickInc(event, {{ $cart->cart_id }}, {{ $cart->max_variant_quantity }})"
                                                        class="fas fa-plus btn-icon__inner"></i>
                                                </button>
                                            </div>

                                            <script>
                                                function inc_qty(id, max) {

                                                    var quantityInput = $('#quantityInput' + id);
                                                    var currentValue = quantityInput.val();
                                                    var total = $('.cart_total_' + id)
                                                    var price = $('#current_price_' + id).val()
                                                    if (currentValue >= max) {
                                                        quantityInput.val(max)
                                                        return false;
                                                    } else {


                                                        var result = parseInt(currentValue) + 1;
                                                        quantityInput.val(result);
                                                        $.ajax({
                                                            url: '/cart/edit',
                                                            type: 'PUT',
                                                            dataType: 'json',
                                                            data: {
                                                                "_token": "{{ csrf_token() }}",
                                                                'cart_id': id,
                                                                'quantity': result

                                                            },
                                                            success: function(response) {
                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')
                                                            },
                                                            error: function(xhr) {
                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')

                                                            }
                                                        });
                                                    }
                                                }

                                                function desc_qty(id, max) {

                                                    var quantityInput = $('#quantityInput' + id);
                                                    var currentValue = quantityInput.val();
                                                    var total = $('.cart_total_' + id)
                                                    var price = $('#current_price_' + id).val()
                                                    if (currentValue == 1) {
                                                        return false;
                                                    } else {


                                                        var result = parseInt(currentValue) - 1;
                                                        quantityInput.val(result);
                                                        $.ajax({
                                                            url: '/cart/edit',
                                                            type: 'PUT',
                                                            dataType: 'json',
                                                            data: {
                                                                "_token": "{{ csrf_token() }}",
                                                                'cart_id': id,
                                                                'quantity': result

                                                            },
                                                            success: function(response) {
                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')
                                                            },
                                                            error: function(xhr) {

                                                                var total_text = eval(price * quantityInput.val())
                                                                total.text('$' + new Intl.NumberFormat().format(total_text) + '.00')
                                                            }
                                                        });
                                                    }
                                                }

                                                function handleSmallClickDesc(event, id, max) {
                                                    event.stopPropagation();
                                                    desc_qty(id, max);
                                                }

                                                function handleSmallClickInc(event, id, max) {
                                                    event.stopPropagation();
                                                    inc_qty(id, max);
                                                }
                                            </script>
                                        </div>

                                        <!-- End Quantity -->
                                </td>

                                <td data-title="Total">
                                    <span class="cart_total_{{ $cart->cart_id }}">@php
                                        if (isset($cart->promotion_price)) {
                                            echo '$' . number_format($cart->promotion_price * $cart->quantity) . '.00';
                                        }else {
                                            echo '$' . number_format($cart->original_price * $cart->quantity) . '.00';

                                        }
                                    @endphp</span>
                                </td>
                            </tr>
                        @empty



                            <div class="alert alert-warning">
                                *Không có sản phẩm nào trong giỏ hàng
                            </div>

                        @endforelse




                        <tr>
                            <td colspan="6" class="border-top space-top-2 justify-content-center">
                                <div class="pt-md-3">
                                    <div style="margin-bottom: 20rem" class="d-block d-md-flex flex-center-between">
                                        <div class="mb-3 mb-md-0 w-xl-40">
                                            <!-- Apply coupon Form -->

                                            <!-- End Apply coupon Form -->
                                        </div>
                                        <div class="d-md-flex">
                                            <button type="button"
                                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Trang chủ</button>
                                            <a href="{{route('admin.checkout')}}"
                                                class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
