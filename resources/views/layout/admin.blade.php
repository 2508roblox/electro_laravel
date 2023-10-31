
<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />




    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no" />
    <title>Stroyka Admin - eCommerce Dashboard Template</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.ltr.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/highlight.js/styles/github.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/simplebar/simplebar.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/quill/quill.snow.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/air-datepicker/css/datepicker.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/css/dataTables.bootstrap5.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/nouislider/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/vendor/fullcalendar/main.min.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}"   />
    {{-- slider --}}
    {{--  ckeditor --}}
    <script  src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-97489509-8');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
  @include('inc.admin._sidebar')
  @include('inc.admin._header')
  @yield('content')
    <!-- sa-app__body / end -->
    <!-- sa-app__footer -->

    <!-- sa-app__footer / end -->
    </div>
    <!-- sa-app__content / end -->
    <!-- sa-app__toasts -->
    <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
    <!-- sa-app__toasts / end -->
    </div>
    <!-- sa-app / end -->
    <!-- scripts -->

    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/vendor/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/highlight.js/highlight.pack.js')}}"></script>
    <script src="{{asset('admin/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('admin/vendor/air-datepicker/js/datepicker.min.js')}}"></script>
    <script src="{{asset('admin/vendor/air-datepicker/js/i18n/datepicker.en.js')}}"></script>
    <script src="{{asset('admin/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('admin/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('admin/vendor/fullcalendar/main.min.js')}}"></script>
    <script src="{{asset('admin/js/stroyka.js')}}"></script>
    <script src="{{asset('admin/js/custom.js')}}"></script>
    <script src="{{asset('admin/js/calendar.js')}}"></script>
    <script src="{{asset('admin/js/demo.js')}}"></script>
    <script src="{{asset('admin/js/demo-chart-js.js')}}"></script>
</body>

</html>
