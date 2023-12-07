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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('home') }}">Trang
                                chủ</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Liên hệ
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->


    <div class="container">
        <div class="mb-5">
            <h1 class="text-center">Liên hệ</h1>
        </div>
        <div class="row mb-10">
            <div class="col-lg-12 col-xl-12 mb-12 mb-lg-0">
                <div class="mr-xl-6">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Hãy để lại cho chúng tôi một tin nhắn của bạn

                        </h3>
                    </div>
                    @error('firstname')
                    {{ $message }}
                    @enderror
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <form class="js-validate" action="{{ route('frontend.contact.store') }}" method="POST" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Họ tên
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="firstname" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-6">
                                <!-- Input -->
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="lastname" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" value="<?php 
        if (Auth::check()) {
            echo Auth::user()->email;
        } else {
            
        }
    ?>">

                                </div>
                                <!-- End Input -->
                            </div>

                            <div class="col-md-12">
                                <!-- Input -->
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Tiêu đề
                                    </label>
                                    <input type="text" class="form-control" name="subject" placeholder="" aria-label="" data-msg="Please enter subject." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <!-- End Input -->
                            </div>
                            <div class="col-md-12">
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                        Nội dung
                                    </label>

                                    <div class="input-group">
                                        <textarea class="form-control p-5" rows="4" name="message" placeholder="" maxlength="250"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary-dark-w px-5">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
