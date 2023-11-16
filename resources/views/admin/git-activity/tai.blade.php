@extends('layout.admin')

@section('content')
<div id="top" class="sa-app__body">
  <style>
    iframe {
      /* position: fixed; */
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: none;
    }
  </style>
  <script>

    var iframe = document.querySelector("iframe");


    iframe.onload = function () {

      iframe.style.height = window.innerHeight + "px";
    };


    window.addEventListener("resize", function () {

      iframe.style.height = window.innerHeight + "px";
    });
  </script>
  <body>
    <iframe src="https://github.com/2508roblox/electro_laravel/activity?ref=tai"></iframe>
  </body>
</div>

@endsection