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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Wallet</h1>
            </div>
            <div class="mb-10 cart-table" style="margin-bottom: 10rem">
                <h1>Balance: {{$wallet->balance}}$</h1>
                <a href="{{ route('frontend.transaction') }}" class="text-black">Transactions</a>
            </div>
            <form action="{{ route('frontend.transaction.store') }}" method="POST">
                @csrf
                <div class="">
                    <h1>Deposit</h1>
                    <label for="amount">Amount:</label>
                    <input type="number" value="{{$wallet->id}}"  hidden name="wallet_id" >
                    <input type="text" value="deposit"  hidden name="type" >
                    <input type="number" id="amount" name="amount" required>

                    <label for="method">Payment Method:</label>
                    <select   name="method" required>
                        <option value="vn_pay">VnPay</option>
                    </select>

                    <button type="submit">Deposit</button>
                </div>
            </form>

        </div>
    </main>
    <hr>
@endsection
