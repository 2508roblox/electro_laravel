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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Bài viết</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->


    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-wd">
                <div class="mb-5">

                    @foreach($blogs as $blog)
                    <article class="card mb-13 border-0">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-lg-4 mb-5 mb-lg-0" bis_skin_checked="1">
                                <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="d-block"><img class="img-fluid min-height-250 object-fit-cover" src="{{$blog->image }}" alt="Image Description"></a>
                            </div>
                            <div class="col-lg-8" bis_skin_checked="1">
                                <div class="card-body p-0" bis_skin_checked="1">
                                    <h4 class="mb-3"><a href="{{ route('fe.post', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h4>
                                    <div class="mb-3 pb-3 border-bottom" bis_skin_checked="1">
                                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5" bis_skin_checked="1">
                                            <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="mx-0dot5 text-gray-5">{{ $blog->tag }}</a>
                                            <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                            <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="mx-0dot5 text-gray-5">{{ $blog->date_time }}</a>
                                        </div>
                                    </div>
                                    <p>{{ $blog->short_description }}</p>
                                    <div class="flex-horizontal-center" bis_skin_checked="1">
                                        <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Đọc thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach

                </div>
            </div>
        </div>


    </div>
</main>
@endsection
