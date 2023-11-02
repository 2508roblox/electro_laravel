<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <!-- CSS Electro Template -->







        {{-- sssssssssssssssssss --}}
        <!-- Title -->
        <title>Electro </title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon -->
        <link rel="shortcut icon" href="/cropped-electro-fav-icon-2-32x32.png">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
            rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{ asset('client/vendor/font-awesome/css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('client/css/font-electro.css') }}">

        <link rel="stylesheet" href="{{ asset('client/vendor/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('client/vendor/hs-megamenu/src/hs.megamenu.css') }}">
        <link rel="stylesheet"
            href="{{ asset('client/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('client/vendor/fancybox/jquery.fancybox.css') }}">
        <link rel="stylesheet" href="{{ asset('client/vendor/slick-carousel/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('client/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

        <link rel="stylesheet" href="{{ asset('client/vendor/ion-rangeslider/css/ion.rangeSlider.css') }}">
        <link rel="stylesheet" href="{{ asset('client/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{ asset('client/css/theme.css') }}">
    </head>

<body>

    @include('inc._topbar');
    @yield('content');

    <a class="js-go-to u-go-to" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
        data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
        <span class="fas fa-arrow-up u-go-to__inner"></span>
    </a>
    @include('inc._sidebarNavigation')
    @include('inc._accountSidebar')
    @include('inc._footer')
    <!-- End Go to Top -->

    <!-- JS Global Compulsory -->
    <script src="{{ asset('client/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('client/vendor/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('client/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('client/vendor/bootstrap/bootstrap.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('client/vendor/appear.js') }}"></script>
    <script src="{{ asset('client/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('client/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ asset('client/vendor/svg-injector/dist/svg-injector.min.js') }}"></script>
    <script src="{{ asset('client/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}">
    </script>
    <script src="{{ asset('client/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('client/vendor/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('client/vendor/typed.js/lib/typed.min.js') }}"></script>
    <script src="{{ asset('client/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ asset('client/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- JS Electro -->
    <script src="{{ asset('client/js/hs.core.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.countdown.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.header.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.hamburgers.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.unfold.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.focus-state.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.malihu-scrollbar.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.validation.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.range-slider.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.fancybox.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.onscroll-animation.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.slick-carousel.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.show-animation.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.svg-injector.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.go-to.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.selectpicker.js') }}"></script>







    <!-- JS Implementing Plugins -->
    <script src="{{ asset('client/vendor/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

    <!-- JS Electro -->
    <script src="{{ asset('client/js/components/hs.quantity-counter.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.scroll-nav.js') }}"></script>
    <script src="{{ asset('client/js/components/hs.selectpicker.js') }}"></script>


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
</body>

</html>
