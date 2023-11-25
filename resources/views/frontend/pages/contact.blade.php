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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Contact-v1
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
                <div class="col-lg-7 col-xl-6 mb-8 mb-lg-0">
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
                        <p class="max-width-830-xl text-gray-90">Aenean massa diam, viverra vitae luctus sed, gravida eget
                            est. Etiam nec ipsum porttitor, consequat libero eu, dignissim eros. Nulla auctor lacinia enim
                            id mollis. Curabitur luctus interdum eleifend. Ut tempor lorem a turpis fermentum.</p>
                        <form class="js-validate" action="{{ route('frontend.contact.store') }}" method="POST"
                            novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            First name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="firstname" placeholder=""
                                            aria-label="" required="" data-msg="Please enter your frist name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Last name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="lastname" placeholder=""
                                            aria-label="" required="" data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Subject
                                        </label>
                                        <input type="text" class="form-control" name="subject" placeholder=""
                                            aria-label="" data-msg="Please enter subject." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Your Message
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control p-5" rows="4" name="message" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6">
                    <div class="mb-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4436614905067!2d106.62524811130447!3d10.853821089255002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1700898394765!5m2!1svi!2s"
                            width="100%" height="288" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Our Address</h3>
                    </div>
                    <address class="mb-6 text-lh-23">
                        121 King Street,
                        Melbourne VIC 3000,
                        Australia
                        <div class="">Support(+800)856 800 604</div>
                        <div class="">Email: <a class="text-blue text-decoration-on"
                                href="mailto:contact@yourstore.com">info@electro.com</a></div>
                    </address>
                    <h5 class="font-size-14 font-weight-bold mb-3">Opening Hours</h5>
                    <div class="">Monday to Friday: 9am-9pm</div>
                    <div class="mb-6">Saturday to Sunday: 9am-11pm</div>
                    <h5 class="font-size-14 font-weight-bold mb-3">Careers</h5>
                    <p class="text-gray-90">If you’re interested in employment opportunities at Electro, please email us: <a
                            class="text-blue text-decoration-on"
                            href="mailto:contact@yourstore.com">contact@yourstore.com</a></p>
                </div>
            </div>

        </div>
    </main>
@endsection
