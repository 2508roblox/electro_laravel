@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        {{-- <iframe src="https://www.google.com/webhp?igu=1"name="content" style="width: 100%; height: 100vh;"></iframe> --}}

        <iframe src="https://huutai2312.github.io" frameborder="0"
            style="width: 100%; height: 100vh;"></iframe>
        {{-- <script>
            fetch('https://api.github.com/huutai2312')
                .then(function(response) {
                    return response.json();
                }).then(function(data) {
                    var iframe = document.getElementById('github-iframe');
                    iframe.src = 'data:text/html;base64,' + encodeURIComponent(data['content']);
                });
        </script> --}}
 






    </div>
@endsection
