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
                                <a href="#commentblog" class="font-size-12 text-gray-5 ml-md-4"><i class="far fa-comment"></i> Leave a comment</a>
                            </div>
                            <div class="mb-3 pb-3 border-bottom">
                                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                    <a href="" class="mx-0dot5 text-gray-5">{{ $blog->tag }}</a>
                                    <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                    <a href="" class="mx-0dot5 text-gray-5">{{ $blog->date_time }}</a>
                                </div>
                            </div>
                            <p>{!! $blog->long_description !!}</p>
                        </div>
                    </article>

                    <div class="mb-10">
                        <div class="border-bottom border-color-1 mb-10">
                            <h4 class="section-title mb-0 pb-3 font-size-25">{{ $blog->comments->where('is_accept', 'accepted')->where('status', 'show')->count() }} Comments</h4>
                        </div>
                        <ol class="nav">
                            @if($blog->comments)
                            @foreach($blog->comments->where('is_accept', 'accepted')->where('status', 'show')->sortByDesc('created_at') as $comment)
                            <li class="w-100 border-bottom pb-6 mb-6 border-color-1">
                                <div class="d-block d-md-flex media br5left-pd10">
                                    <div class="media-body">
                                        <div class="d-flex">
                                            {{-- <h4 class="font-size-17 font-weight-bold mr-2">{{ $comment->user->name }}</h4> --}}
                                            @if ($comment->user)
                                            <h4 class="font-size-17 font-weight-bold mr-2">{{ $comment->user->name }}</h4>
                                            @else
                                            <h4 class="font-size-17 font-weight-bold mr-2">Người dùng không tồn tại</h4>
                                            @endif
                                            <a class="text-blue ml-auto report-comment" type="button" onclick="reportComment({{ $comment->id }})">Report</a>
                                        </div>
                                        <p>{{ $comment->content }}</p>
                                        <div class="d-flex">
                                            <span class="font-size-14">{{ $comment->created_at->format('F d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ol>

                        <!-- Thêm modal Bootstrap -->
                        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModalLabel">Attention!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Nội dung modal -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function reportComment(commentId) {
                                // Kiểm tra xem người dùng đã report chưa
                                var reported = sessionStorage.getItem('reportedComment' + commentId);

                                if (reported) {
                                    // Nếu đã report, hiển thị thông báo
                                    $('#reportModal .modal-body').html('<div class="alert alert-warning">You have reported this comment!</div>');
                                    $('#reportModal').modal('show');
                                } else {
                                    // Nếu chưa report, gửi yêu cầu Ajax để cập nhật số lượng report
                                    $('#reportModal .modal-body').html('<div class="alert alert-success">Reported!</div>');
                                    $('#reportModal').modal('show');

                                    $.ajax({
                                        url: "{{ route('reportComment', '') }}" + "/" + commentId
                                        , method: "GET"
                                        , success: function(response) {
                                            // Hiển thị modal "Done" khi thành công
                                        }
                                        , error: function(error) {
                                            // Hiển thị modal lỗi nếu có lỗi
                                            $('#reportModal .modal-body').html('<div class="alert alert-danger">Lỗi: ' + error.statusText + '</div>');
                                            $('#reportModal').modal('show');
                                        }
                                    });

                                    // Lưu trạng thái đã report vào session
                                    sessionStorage.setItem('reportedComment' + commentId, true);
                                }
                            }

                        </script>

                    </div>
                    <div class="mb-10" id="commentblog">
                        <div class="border-bottom border-color-1 mb-6">
                            <h4 class="section-title mb-0 pb-3 font-size-25">Leave a Reply</h4>
                        </div>
                        @if(Auth::check())
                        <p class="text-gray-90">Your email address will not be published. Required fields are marked <span class="text-dark">*</span></p>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="js-validate" novalidate="novalidate" action="{{ route('storeComment', $blog->id) }}" method="post">
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
