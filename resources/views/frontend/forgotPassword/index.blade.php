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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Forgot Password</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <form class="js-validate" method="POST" action="{{ route('frontend.forgot.handle') }}" novalidate="novalidate">
            @csrf
        <div class="container d-flex justify-content-center mb-8">

            <div class="card text-center" style="width: 700px;">
                <div class="card-header h5 text-black bg-primary">Password Reset</div>
                <div class="card-body px-5">
                    <p class="card-text py-2">
                        Enter your email address and we'll send you an email with instructions to reset your password.
                    </p>
                    <div class="form-outline">
                        <input type="email" name="email" id="typeEmail" class="rounded-0 form-control my-3" />
                        <label class="form-label" for="typeEmail">Email input</label>
                    </div>
                    <button  class="rounded-0 btn btn-primary w-100">Reset password</button>
                    <div class="d-flex justify-content-between mt-4">
                        <a class="" href="#">Login</a>
                        <a class="" href="#">Register</a>
                    </div>
                </div>
            </div>

        </div>
    </form>
    </main>
    @endsection
