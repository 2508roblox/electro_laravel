@extends('layout.admin')

@section('content')
<div id="top" class="sa-app__body">
  <style>
    /* * {
      border: none;
      outline: none;
      margin: 0;
      padding: 0;
    } */
    /* body {
      margin: 0 auto;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    } */
    iframe {
      /* position: fixed; */
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none; /* Loại bỏ viền biên */
    }
  </style>
  <script>
    // JavaScript để thiết lập thẻ iframe tự động full screen
    var iframe = document.querySelector("iframe");

    // Kiểm tra khi trang đã tải xong
    iframe.onload = function () {
      // Thiết lập chiều cao của iframe bằng chiều cao của cửa sổ trình duyệt
      iframe.style.height = window.innerHeight + "px";
    };

    // Theo dõi sự thay đổi kích thước cửa sổ trình duyệt
    window.addEventListener("resize", function () {
      // Cập nhật chiều cao của iframe khi cửa sổ thay đổi kích thước
      iframe.style.height = window.innerHeight + "px";
    });
  </script>
  <body>
    <iframe src="https://ps26819.vercel.app/"></iframe>
  </body>
</div>

@endsection