@extends('layout.layout')

@section('content')
    @include('inc/_header')
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('home')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Forgot Password</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <form class="js-validate" method="POST" action="{{ route('frontend.forgot.store') }}" novalidate="novalidate">
            @csrf
            <div class="container d-flex justify-content-center mb-8">
                <div class="card text-center" style="width: 700px;">
                    <div class="card-header h5 text-black bg-primary">Change Password</div>
                    <div class="card-body px-5">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <input type="hidden" name="email" value="{{ $email }}" /> <!-- Thêm trường ẩn chứa email -->
                        <div class="form-outline">
                            <label class="form-label" for="password">New Password</label>
                            <input type="password" name="password" id="password" class="rounded-0 form-control my-3" required />
                        </div>
                        <div class="form-outline">
                            <label class="form-label  " for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-0 form-control my-3" required />
                        </div>
                        <button class="rounded-0 btn btn-primary w-100">Reset Password</button>
                        <div class="d-flex justify-content-between mt-4">
                            <a class="" href="{{route('login')}}">Login</a>
                            <a class="" href="{{route('register')}}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    @endsection
