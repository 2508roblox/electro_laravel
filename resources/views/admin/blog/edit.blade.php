@extends('layout.admin')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div id="top" class="sa-app__body">
    <form id="form" method="POST" action="{{route('admin.blog.update', ['id'=> $blog->id])}}">

        @csrf
        @method('PUT')
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.blog') }}">blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit blog</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit blog</h1>
                        </div>
                        <div class="col-auto d-flex"><a href="{{ route('admin.blog') }}" class="btn btn-secondary me-3">Back</a>
                            <button type="submit" id="submit_button" href="#" class="btn btn-primary">Save</button></div>
                    </div>
                </div>
                <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body" method="POST">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/id" class="form-label">ID</label>
                                        <input name="id" type="text" class="form-control" value="{{$blog->id}}" id="form-blog/id" readonly />
                                        @error('id')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/title" class="form-label">Title</label>
                                        <input name="title" type="text" class="form-control" value="{{$blog->title}}" id="form-blog/title" />
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/slug" class="form-label">Slug</label>
                                        <input name="slug" type="text" class="form-control" value="{{$blog->slug}}" id="form-blog/slug" />
                                        @error('slug')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/tag" class="form-label">Tag</label>
                                        <input name="tag" type="text" class="form-control" value="{{$blog->tag}}" id="form-blog/tag" />
                                        @error('tag')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/Datetime" class="form-label">Time</label>
                                        <input name="date_time" type="text" class="form-control" value="{{$blog->date_time}}" id="form-blog/Datetime" readonly />
                                        @error('Datetime')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/short_description" class="form-label">Short description</label>
                                        <textarea name="short_description" id="form-blog/short_description" class="form-control" rows="2">{{ $blog->short_description }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/long_description" class="form-label">Long description</label>
                                        <textarea name="long_description" rows="" cols="80" required>{{ $blog->long_description }}</textarea>
                                        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace('long_description');

                                        </script>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-blog/image" class="form-label">Image</label>
                                        <input name="image" type="text" class="form-control" value="{{$blog->image}}" id="form-blog/image" />
                                        <br>
                                        <img src="{{ $blog->image }}" alt="" width="100px">
                                        @error('image')
                                        {{$message}}
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Status</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-check">
                                            <input type="radio" class="form-check-input" {{ $blog->status == "Published" ? 'checked' : '' }} name="status" value="Published" />
                                            <span class="form-check-label">Published</span>
                                        </label>
                                        <label class="form-check mb-0">
                                            <input {{ $blog->status == "Draft" ? 'checked' : '' }} value="Draft" type="radio" class="form-check-input" name="status" />
                                            <span class="form-check-label">Draft</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>


@endsection
