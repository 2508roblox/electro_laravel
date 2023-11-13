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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Verify
                                Email</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <div class="container height-100 d-flex justify-content-center align-items-center mb-10">
            <div class="position-relative">
            <form action="{{route('frontend.otp.view')}}" method="POST">
                @csrf

                <div class="card p-2 text-center">
                    <h6>Please enter the one time password <br> to verify your account</h6>
                    <div> <span>A code has been sent to</span> <small>{{ Session::get('registeredEmail')}}</small> </div>
                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input
                            class="m-2 text-center form-control rounded" type="text" id="first" name="otp[]" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" id="second" name="otp[]" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" id="third" name="otp[]" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" id="fourth" name="otp[]" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" id="fifth" name="otp[]" maxlength="1" />
                        <input class="m-2 text-center form-control rounded" type="text" id="sixth" name="otp[]" maxlength="1" />
                    </div>
                    <div class="mt-4 mb-10"> <button class="btn btn-danger px-4 pointer ">Validate</button> </div>
                </div>
            </form>
                <div class="card-2">
                    <div class="content d-flex justify-content-center align-items-center"> <span>Didn't get the code</span>
                        <a href="#" class="text-decoration-none ms-3">Resend(1/3)</a> </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

                function OTPInput() {
                    const inputs = document.querySelectorAll('#otp > *[id]');
                    for (let i = 0; i < inputs.length; i++) {
                        inputs[i].addEventListener('keydown', function(event) {
                            if (event.key === "Backspace") {
                                inputs[i].value = '';
                                if (i !== 0) inputs[i - 1].focus();
                            } else {
                                if (i === inputs.length - 1 && inputs[i].value !== '') {
                                    return true;
                                } else if (event.keyCode > 47 && event.keyCode < 58) {
                                    inputs[i].value = event.key;
                                    if (i !== inputs.length - 1) inputs[i + 1].focus();
                                    event.preventDefault();
                                } else if (event.keyCode > 64 && event.keyCode < 91) {
                                    inputs[i].value = String.fromCharCode(event.keyCode);
                                    if (i !== inputs.length - 1) inputs[i + 1].focus();
                                    event.preventDefault();
                                }
                            }
                        });
                    }
                }
                OTPInput();


            });
        </script>

    </main>
@endsection
