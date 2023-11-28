<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charSet="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">




    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no" />
    <title>Electro | Admin</title>
    <!-- icon -->
    <link rel="shortcut icon" href="/cropped-electro-fav-icon-2-32x32.png">
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->

    <link rel="stylesheet" href="{{ asset('css/all-admin.css') }}" />
    {{-- slider --}}
    {{--  ckeditor --}}
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8')}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-97489509-8');
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function showNotification(mess) {
            Toastify({
                text: mess,
                duration: 3000, // Thời gian hiển thị (3 giây)
                newWindow: true,
                close: true,
                gravity: "top", // Vị trí hiển thị thông báo
                position: "right", // Vị trí hiển thị thông báo
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true,
            }).showToast();
        }
    </script>
    <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"></script>

    <script>
        // Kết nối tới máy chủ Socket.IO
        const socket = io('https://electro-whsy.onrender.com/');

        socket.on('chat-message', (message) => {
            console.log('Received message from server:', message);
            showNotification(message)
        });
    </script>
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


    <script src="{{ asset('js/all-admin.js') }}"></script>
    <script src="{{ asset('admin/js/variant.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- edit --}}

</body>

</html>
