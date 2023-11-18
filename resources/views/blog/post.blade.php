@extends('layout.layout')
@section('content')
@include('inc/_header')
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">

            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-wd">
                <div class="min-width-1100-wd">
                    <article class="card mb-8 border-0">
                        <img class="img-fluid" src="{{ asset($blog->image) }}" alt="Image Description">
                        <div class="card-body pt-5 pb-0 px-0">
                            <div class="d-block d-md-flex flex-center-between mb-4 mb-md-0">
                                <h4 class="mb-md-3 mb-1">{{ $blog->title }}</h4>
                                <a href="#" class="font-size-12 text-gray-5 ml-md-4"><i class="far fa-comment"></i> Leave a comment</a>
                            </div>
                            <div class="mb-3 pb-3 border-bottom">
                                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                    <a href="../blog/single-blog-post.html" class="mx-0dot5 text-gray-5">{{ $blog->tag }}</a>
                                    <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                    <a href="../blog/single-blog-post.html" class="mx-0dot5 text-gray-5">{{ $blog->date_time }}</a>
                                </div>
                            </div>
                            <p>{!! $blog->long_description !!}</p>
                        </div>
                    </article>

                    <div class="mb-10">
                        <div class="border-bottom border-color-1 mb-10">
                            <h4 class="section-title mb-0 pb-3 font-size-25">1 Comments</h4>
                        </div>
                        <ol class="nav">
                            <li class="w-100 border-bottom pb-6 mb-6 border-color-1">
                                <!-- Review -->
                                <div class="d-block d-md-flex media br5left-pd10">
                                    <div class="media-body">
                                        <div class="d-flex">
                                            <h4 class="font-size-17 font-weight-bold mr-2">John Doe</h4>
                                            <a href="#" class="text-blue ml-auto">Report</a>
                                        </div>
                                        <p>Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                        <div class="d-flex">
                                            <span class="font-size-14">March 16, 2016</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Review -->
                            </li>

                        </ol>
                    </div>
                    <div class="mb-10">
                        <div class="border-bottom border-color-1 mb-6">
                            <h4 class="section-title mb-0 pb-3 font-size-25">Leave a Reply</h4>
                        </div>
                        @if(Auth::check())
                        <p class="text-gray-90">Your email address will not be published. Required fields are marked <span class="text-dark">*</span></p>
                        <form class="js-validate" novalidate="novalidate">
                            @csrf
                            <div class="js-form-message mb-4">
                                <label class="form-label">
                                    Comment
                                    <span class="text-danger">*</span>
                                </label>

                                <div class="input-group">
                                    <textarea class="form-control p-5" rows="4" name="content" placeholder="" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" placeholder="" aria-label="" required="" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off" value="{{ Auth::user()->name }}">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Email address
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="email" class="form-control" name="email" placeholder="" aria-label="" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Website
                                        </label>
                                        <input type="text" class="form-control" name="website" placeholder="" aria-label="" data-msg="Please enter website name." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Post Comment</button>
                            </div>
                        </form>
                        @else
                        <p class="br5left-pd10">Bạn cần đăng nhập để bình luận.</p>
                        <a href="{{ route('login') }}">Đăng nhập ngay</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
