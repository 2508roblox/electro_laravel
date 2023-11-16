@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        <div style="width: 100%; height: 100vh;">

            <link
                href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic|Source+Code+Pro:300,400,700'
                rel='stylesheet' type='text/css'>


            <div style="display: flex; width: 100%;">
                <div style="width: 25%;">
                    <iframe src="http://127.0.0.1:8000/usecase/contents/navigation.html" name="navigation"
                        style="width: 100%; height: 100vh;"></iframe>
                </div>
                <div style="width: 75%;">
                    <iframe src="http://127.0.0.1:8000/usecase/contents/cf9c8b720f3815adeccaf3ef6e48c6c4.html"
                        name="content" style="width: 100%; height: 100vh;"></iframe>
                </div>
            </div>




        </div>
    </div>

    </div>
    </div>
@endsection
