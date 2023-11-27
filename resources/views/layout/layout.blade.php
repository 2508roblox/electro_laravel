<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Title -->
    <title>Electro </title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/cropped-electro-fav-icon-2-32x32.png">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('client/css/font-electro.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
    <style>
        body{
            cursor: none
        }
        a,p,div{
            cursor: none
        }

        body:*{
            cursor: none
        }

        div[class*='kursor'] {
            background: #febe00 !important;
        }
        div[class*='kursor'] {
            border-color: #fed700 !important;
        }
        img {
            filter: grayscale(1);
        }

        img:hover,
        img:focus {
            filter: grayscale(0);
        }
    </style>


    <!-- CSS Electro Template -->

    <!-- CSS W3SChool -->
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
    <style>
        @import url("https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
    </style>
    <style>
        .swal2-styled.swal2-confirm {

            background-color: #fed700 !important;
        }

        .swal2-popup {}

        .swal2-popup {
            border: 10px solid red !important;
            padding: 15px !important;
            border-image: url(https://www.w3schools.com/cssref/border.png) 30 round !important;
        }
        /* Webkit (Chrome, Safari, Opera) */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-thumb {
  background-color: #fed700; /* Màu sắc của thanh cuộn */
}

::-webkit-scrollbar-track {
  background-color: #f2f2f2; /* Màu sắc của phần còn lại của thanh cuộn */
}
html {
  scroll-behavior: smooth;
}


    </style>
<script>
    $(document).ready(function() {
  $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if (target.length) {
      event.preventDefault();
      $('html, body').stop().animate({
        scrollTop: target.offset().top
      }, 1000); // Thời gian cuộn (milliseconds)
    }
  });
});
</script>
    @php
        $telegramBotToken = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $authName = Auth::check() ? Auth::user()->name : 'Guest';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDateTime = date('d-m-Y H:i:s');

        $routeName = \Route::currentRouteName();

        if ($routeName === 'home') {
            $message = "💀 User truy cập trang chủ\n💻 $ipAddress\n🙍‍♂️ $authName\n⌚ $currentDateTime";
        } elseif ($routeName === 'login' || $routeName === 'register') {
            $message = "💀 User đăng nhập/đăng ký\n💻 $ipAddress\n🙍‍♂️ $authName\n⌚ $currentDateTime";
        } elseif ($routeName === 'admin.checkout') {
            $message = "💀 User thanh toán\n💻 $ipAddress\n🙍‍♂️ $authName\n⌚ $currentDateTime";
        } elseif ($routeName === 'frontend.order.list') {
            $message = "💀 User đã thanh toán > Order\n💻 $ipAddress\n🙍‍♂️ $authName\n⌚ $currentDateTime";
        } else {
            $message = null;
            // $message = "User truy cập trang không xác định: $ipAddress | $authName";
        }

        $telegramApiUrl = "https://api.telegram.org/bot$telegramBotToken/sendMessage";

        // Dữ liệu gửi đến API
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
        ];

        // cURL để gửi request
        $ch = curl_init($telegramApiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        // echo $result;

    @endphp


    <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const socket = io('http://localhost:7000', {
                transports: ['websocket']
            });

            socket.on('connect', () => {
                @if (Route::currentRouteName() == 'home')
                    socket.emit('chat-message', 'Có người đang truy cập trang Home');
                @elseif (Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register')
                    socket.emit('chat-message', 'Có người đang truy cập trang Login/Register');
                @elseif (Route::currentRouteName() == 'admin.checkout')
                    socket.emit('chat-message', 'Có người đang thanh toán sản phẩm');
                @endif
            });

            socket.on('disconnect', () => {
                // console.log('Mất kết nối từ máy chủ');
            });

            socket.on('chat-message', (message) => {
                // console.log('Nhận tin nhắn từ máy chủ:', message);
            });
        });
    </script>
    {{-- captcha --}}
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>



<body >

    @include('inc._topbar')
    @yield('content')

    <a class="js-go-to u-go-to " style="margin-right: 5rem; margin-bottom: .5rem;" href="#"
        data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header"
        data-show-effect="slideInUp" data-hide-effect="slideOutDown">
        <span class="fas fa-arrow-up u-go-to__inner"></span>
    </a>
    @include('inc._sidebarNavigation')
    @include('inc._mouseEffect')
    @include('inc._accountSidebar')
    @include('inc._footer')
    <!-- End Go to Top -->
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger intent="WELCOME" chat-title="Electro Assistant" agent-id="0953d30d-3636-4204-996e-37cad8d999e7"
        language-code="en"></df-messenger>
    <style>
        df-messenger {

            --df-messenger-bot-message: #fed700;
            --df-messenger-chat-background-color: #fafafa;
            --df-messenger-font-color: #000000;
            ---df-messenger-user-message: #1187ee;
            --df-messenger-button-titlebar-color: #fed700;
            --df-messenger-titlebar-color: #fed700;
        }

        .title-wrapper {
            background: red !important;
        }
    </style>
    <!-- JS Global Compulsory -->

    <script src="{{ asset('js/all.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>






























    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                direction: 'horizontal',
                pageContainer: $('.container'),
                breakpoint: 767.98,
                hideTimeOut: 0
            });
        });

        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of animation
            $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of popups
            $.HSCore.components.HSFancyBox.init('.js-fancybox');

            // initialization of countdowns
            var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                yearsElSelector: '.js-cd-years',
                monthsElSelector: '.js-cd-months',
                daysElSelector: '.js-cd-days',
                hoursElSelector: '.js-cd-hours',
                minutesElSelector: '.js-cd-minutes',
                secondsElSelector: '.js-cd-seconds'
            });

            // initialization of malihu scrollbar
            $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

            // initialization of forms
            $.HSCore.components.HSFocusState.init();

            // initialization of form validation
            $.HSCore.components.HSValidation.init('.js-validate', {
                rules: {
                    confirmPassword: {
                        equalTo: '#signupPassword'
                    }
                }
            });

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // initialization of fancybox
            $.HSCore.components.HSFancyBox.init('.js-fancybox');

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            // initialization of hamburgers
            $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                beforeClose: function() {
                    $('#hamburgerTrigger').removeClass('is-active');
                },
                afterClose: function() {
                    $('#headerSidebarList .collapse.show').collapse('hide');
                }
            });

            $('#headerSidebarList [data-toggle="collapse"]').on('click', function(e) {
                e.preventDefault();

                var target = $(this).data('target');

                if ($(this).attr('aria-expanded') === "true") {
                    $(target).collapse('hide');
                } else {
                    $(target).collapse('show');
                }
            });

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of select picker
            $.HSCore.components.HSSelectPicker.init('.js-select');
        });
    </script>
    {{-- font --}}
    <script>
        // duyệt tất cả tấm ảnh cần lazy-load
        const lazyImages = document.querySelectorAll('[lazy]');

        // chờ các tấm ảnh này xuất hiện trên màn hình
        const lazyImageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                // tấm ảnh này đã xuất hiện trên màn hình
                if (entry.isIntersecting) {
                    const lazyImage = entry.target;
                    const src = lazyImage.dataset.src;

                    lazyImage.tagName.toLowerCase() === 'img'
                        // <img>: copy data-src sang src
                        ?
                        lazyImage.src = src

                        // <div>: copy data-src sang background-image
                        :
                        lazyImage.style.backgroundImage = "url(\'" + src + "\')";

                    // copy xong rồi thì bỏ attribute lazy đi
                    lazyImage.removeAttribute('lazy');

                    // job done, không cần observe nó nữa
                    observer.unobserve(lazyImage);
                }
            });
        });

        // Observe từng tấm ảnh và chờ nó xuất hiện trên màn hình
        lazyImages.forEach((lazyImage) => {
            lazyImageObserver.observe(lazyImage);
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/kursor@0.0.14/dist/kursor.js"  > </script>
<script>
    new kursor({
        type: 2
    })
</script>


</body>



</html>
