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
                <div class="col-xl-9 col-wd">
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
                                    <div class="d-block d-md-flex media">
                                        <div class="u-xl-avatar mr-md-4 mb-4 mb-md-0">
                                            <img class="img-fluid rounded-circle" src="../../assets/img/100X100/img19.jpg" alt="Image Description">
                                        </div>
                                        <div class="media-body">
                                            <p>Fusce vitae nibh mi. Integer posuere, libero et ullamcorper facilisis, enim eros tincidunt orci, eget vestibulum sapien nisi ut leo. Cras finibus vel est ut mollis. Donec luctus condimentum ante et euismod.</p>
                                            <div class="d-flex">
                                                <h4 class="font-size-14 font-weight-bold mr-2"><a href="../blog/single-blog-post.html" class="">John Doe</a></h4>
                                                <span><a href="../blog/single-blog-post.html" class="text-gray-23">March 16, 2016</a></span>
                                                <a href="#" class="text-blue ml-auto">Reply</a>
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
                            <p class="text-gray-90">Your email address will not be published. Required fields are marked <span class="text-dark">*</span></p>
                            <form class="js-validate" novalidate="novalidate">
                                <div class="js-form-message mb-4">
                                    <label class="form-label">
                                            Comment
                                        </label>

                                    <div class="input-group">
                                        <textarea class="form-control p-5" rows="4" name="text" placeholder=""></textarea>
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
                                            <input type="text" class="form-control" name="Name" placeholder="" aria-label="" required="" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
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
                                            <input type="email" class="form-control" name="emailAddress" placeholder="" aria-label="" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
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
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-wd">
                    <aside class="mb-7">
                        <form class="">
                            <div class="d-flex align-items-center">
                                <label class="sr-only" for="signupSrEmail">Search Electro blog</label>
                                <div class="input-group">
                                    <input type="text" class="form-control px-4" name="search" id="signupSrEmail" placeholder="Search..." aria-label="Search Electro blog">
                                </div>
                                <button type="submit" class="btn btn-primary text-nowrap ml-3 d-none">
                                        <span class="fas fa-search font-size-1 mr-2"></span> Search
                                    </button>
                            </div>
                        </form>
                    </aside>
                    <aside class="mb-7">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">About Blog</h3>
                        </div>
                        <p class="text-gray-90 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt, erat in malesuada aliquam, est erat faucibus purus, eget viverra nulla sem vitae neque. Quisque id sodales libero.</p>
                    </aside>
                    <aside class="mb-7">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Categories</h3>
                        </div>
                        <div class="list-group">
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-0"><i class="mr-2 fas fa-angle-right"></i> Design</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Events</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Links & Quotes</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> News</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Social</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Technology</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Audios</a>
                            <a href="../blog/single-blog-post.html" class="font-bold-on-hover px-3 py-2 list-group-item list-group-item-action border-right-0 border-left-0 border-bottom-0"><i class="mr-2 fas fa-angle-right"></i> Videos</a>
                        </div>
                    </aside>
                    <aside class="mb-7">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Recent Posts</h3>
                        </div>
                        <article class="mb-4">
                            <div class="media">
                                <div class="width-75 height-75 mr-3">
                                    <img class="img-fluid object-fit-cover" src="../../assets/img/1500X730/img1.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Post with Gallery</a></h4>
                                    <span class="text-gray-5">March 3, 2020</span>
                                </div>
                            </div>
                        </article>
                        <article class="mb-4">
                            <div class="media">
                                <div class="width-75 height-75 mr-3">
                                    <img class="img-fluid object-fit-cover" src="../../assets/img/1500X730/img4.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Now Closed – Post with Audio</a></h4>
                                    <span class="text-gray-5">March 3, 2020</span>
                                </div>
                            </div>
                        </article>
                        <article class="mb-4">
                            <div class="media">
                                <div class="width-75 height-75 mr-3">
                                    <img class="img-fluid object-fit-cover" src="../../assets/img/1500X730/img5.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Now Closed – Post with Video</a></h4>
                                    <span class="text-gray-5">March 3, 2020</span>
                                </div>
                            </div>
                        </article>
                        <article class="mb-4">
                            <div class="media">
                                <div class="width-75 height-75 mr-3 position-relative">
                                    <img class="img-fluid object-fit-cover" src="https://placehold.it/150x150/DDD/DDD/" alt="Image Description">
                                    <i class="fa fa-paragraph position-absolute-center text-white"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Announcement – Post without Image</a></h4>
                                    <span class="text-gray-5">March 3, 2020</span>
                                </div>
                            </div>
                        </article>
                        <article class="mb-4">
                            <div class="media">
                                <div class="width-75 height-75 mr-3">
                                    <img class="img-fluid object-fit-cover" src="../../assets/img/1500X730/img6.jpg" alt="Image Description">
                                </div>
                                <div class="media-body">
                                    <h4 class="font-size-14 mb-1"><a href="../blog/single-blog-post.html" class="text-gray-39">Robot Wars – Now Closed</a></h4>
                                    <span class="text-gray-5">March 3, 2020</span>
                                </div>
                            </div>
                        </article>
                    </aside>
                    <aside class="mb-7">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Tags Clouds</h3>
                        </div>
                        <div class="d-flex flex-wrap mx-n1">
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">amazon like</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">Awesome</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">bootstrap</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">buy it</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">clean design</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">electronics</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">theme</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">video post format</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">Ecommerce</a>
                            <a href="../blog/single-blog-post.html" class="text-gray-90 mb-2 bg-primary-on-hover py-2 px-3 border mx-1">wordpress</a>
                        </div>
                    </aside>
                </div>
            </div>
            <!-- Brand Carousel -->
            <div class="mb-6">
                <div class="py-2 border-top border-bottom">
                    <div class="js-slick-carousel u-slick my-1" data-slides-show="5" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y" data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right" data-responsive='[{
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 2
                                }
                            }, {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }, {
                                "breakpoint": 554,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }]'>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img1.png" alt="Image Description">
                                </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img2.png" alt="Image Description">
                                </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img3.png" alt="Image Description">
                                </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img4.png" alt="Image Description">
                                </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img5.png" alt="Image Description">
                                </a>
                        </div>
                        <div class="js-slide">
                            <a href="#" class="link-hover__brand">
                                    <img class="img-fluid m-auto max-height-50" src="../../assets/img/200X60/img6.png" alt="Image Description">
                                </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Brand Carousel -->
        </div>
    </main>
    @endsection