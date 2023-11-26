@extends('layout.admin')
@section('content')
<div id="top" class="sa-app__body">
    <div class="py-5 py-md-6 my-2 px-5">
        <div class="sa-hero-header">
            <div class="sa-hero-header__title">
                <h1>Electro Auto Create Blog</h1>
                <p>{{ env('SOURCE_NEWSAPI') }}</p>
            </div>
            <div class="sa-hero-header__controls">
                <div class="col-auto d-flex" style="justify-content: center">
                    <a href="{{ route('admin.blog.get-post') }}" class="btn btn-primary" id="myButton">Get Post</a>
                </div>
                <div class="col-auto d-flex" style="justify-content: center">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @else
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
