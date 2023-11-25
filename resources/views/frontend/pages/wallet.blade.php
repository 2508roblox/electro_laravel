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
                <h1 class="text-center" style="font-size: 28px; color: #333;">Wallet</h1>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="mb-10 cart-table col-7"
                    style="margin-bottom: 10rem; background-color: #f8f9fa; border-radius: 10px; padding: 20px;">
                    <div class="d-flex justify-content-between">
                        <p>Main account</p>
                        <p>Electro wallet</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-column">
                            <h1 style="font-size: 44px; color: #333;">Số dư Ví Electro:</h1>
                            <p>*** **** *** 678</p>
                        </div>
                        <h1 style="font-size: 44px; color: #333;"> {{ $wallet->balance }}.00$</h1>
                    </div>
                    <a style="cursor: pointer" class="btn rounded-sm btn-primary mt-3 transition" id="transactionBtn">Lịch
                        sử nạp tiền</a>
                    <script src="{{ asset('client/vendor/jquery/dist/jquery.min.js') }}"></script>

                    <script>
                        $(document).ready(function() {
                            $('#transactionBtn').on('click', function(e) {
                                e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

                                var originalText = $(this).text(); // Lưu trữ nội dung ban đầu của thẻ <a>

                                // Thay đổi thẻ <a> thành disable và hiển thị "Loading..."
                                $(this).attr('disabled', true).text('Loading...');

                                // Lưu trữ màu nền ban đầu của nút
                                var originalColor = $(this).css('background-color');

                                // Thay đổi màu nền của nút


                                // Chuyển hướng đến đường dẫn sau một khoảng thời gian nhất định (ở đây là 2 giây)
                                var href = '{{ route('frontend.transaction') }}';
                                setTimeout(function() {
                                    window.location.href = href;
                                }, 2000);
                            });
                        });
                    </script>
                </div>
                <div class="">
                    <img width="500px" class="img-fluid mb-10" src="{{ asset('client/img/ecard.png') }}"
                        alt="Image Description">

                </div>
            </div>
            <form id="transaction-form" action="{{ route('frontend.transaction.store') }}" method="POST">
                @csrf
                <div class="mb-4" style="background-color: #f8f9fa; border-radius: 10px; padding: 20px;">
                    <h1 style="font-size: 24px; color: #333;">Nạp tiền</h1>
                    <div class="form-group">
                        <label for="amount">Số tiền cần nạp:</label>
                        <input type="number" value="{{ $wallet->id }}" hidden name="wallet_id">
                        <input type="text" value="deposit" hidden name="type">
                        <input type="number" id="amount" value="1000" name="amount" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="method">Phương thức thanh toán:</label>
                        <select name="method" class="form-control" required>
                            <option value="vn_pay">VnPay</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit-btn">Xác nhận</button>
                    <button type="button" class="btn btn-secondary">Hủy</button>
                </div>
            </form>

            <script>
                document.getElementById('transaction-form').addEventListener('submit', function() {
                    var submitBtn = document.getElementById('submit-btn');
                    submitBtn.innerHTML = 'Loading...';
                    submitBtn.disabled = true;
                });
            </script>

        </div>
    </main>
    <hr>
@endsection
