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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Blog</li>
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
                
                    {{-- @php
                        $url = "https://vnexpress.net/rss/kinh-doanh.rss";
                    
                        $feedArr = json_decode(json_encode(simplexml_load_file($url)), true);
                        if (isset($feedArr['channel'])) {
                            if (isset($feedArr['channel']['item'])) {
                                foreach ($feedArr['channel']['item'] as $item) {
                                    
                                    echo '<article class="card mb-13 border-0">';
                        echo '<div class="js-slick-carousel u-slick overflow-hidden" data-pagi-classes="js-pagination u-slick__pagination u-slick__pagination--long u-slick__pagination--hover mb-0">';
                            echo '<div class="js-slide">';
                                echo '<a href="" class="d-block"><img class="img-fluid" src="'.$item['description'].'" alt="Image Description"></a>';
                            echo '</div>';
                            echo '<div class="js-slide">';
                                echo '<a href="" class="d-block"><img class="img-fluid" src="'.$item['description'].'" alt="Image Description"></a>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="card-body pt-5 pb-0 px-0">';
                            echo '<h4 class="mb-3"><a href="">'.$item['title'].'</a></h4>';
                            echo '<div class="mb-3 pb-3 border-bottom">';
                                echo '<div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">';
                                    echo '<span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>';
                                    echo '<a class="mx-0dot5 text-gray-5">'.$item['pubDate'].'</a>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="flex-horizontal-center">';
                                echo '<a href="" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</article>';
                                
                                    // echo "<p>";
                                    // print_r($item);
                                    // echo "</p>";
                                }
                            } else {
                                echo "Error: Không có mục trong feed";
                            }
                        } else {
                            echo "Error: Không có thông tin kênh (channel) trong feed";
                        }
                    @endphp --}}
                


                    
                    
                
                    @foreach($blogs as $blog)
                    <article class="card mb-13 border-0">
                        <div class="js-slick-carousel u-slick overflow-hidden" data-pagi-classes="js-pagination u-slick__pagination u-slick__pagination--long u-slick__pagination--hover mb-0">
                            <div class="js-slide">
                                <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="d-block"><img class="img-fluid" src="{{$blog->image }}" alt="Image Description"></a>
                            </div>
                            <div class="js-slide">
                                <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="d-block"><img class="img-fluid" src="{{$blog->image }}" alt="Image Description"></a>
                            </div>
                        </div>
                        <div class="card-body pt-5 pb-0 px-0">
                            <h4 class="mb-3"><a href="{{ route('fe.post', ['id' => $blog->id]) }}">{{ $blog->title }}</a></h4>
                            <div class="mb-3 pb-3 border-bottom">
                                <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                    <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="mx-0dot5 text-gray-5">{{ $blog->tag }}</a>
                                    <span class="mx-2 font-size-n5 mt-1 text-gray-5"><i class="fas fa-circle"></i></span>
                                    <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="mx-0dot5 text-gray-5">{{ $blog->date_time }}</a>
                                </div>
                            </div>
                            <p>{{ $blog->short_description }}</p>
                            <div class="flex-horizontal-center">
                                <a href="{{ route('fe.post', ['id' => $blog->id]) }}" class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>
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
