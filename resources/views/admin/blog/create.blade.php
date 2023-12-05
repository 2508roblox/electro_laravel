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
    {{-- <hr>
    <form id="form" method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Create blog</h1>
                        </div>
                        <div class="col-auto d-flex"><a href="{{ route('admin.brand.list') }}" class="btn btn-secondary me-3">Back</a><button type="submit" id="submit_button" href="#" class="btn btn-primary">Save</button></div>
                    </div>
                </div>
                <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                    </div>
                                    <div class="mb-4"><label for="form-blog/image" class="form-label">Image</label>
                                        <input name="fileImage" type="file" class="form-control" id="form-blog/image" /><br>
                                        <button type="submit" id="getLinkImage" href="#" class="btn btn-primary">Xác nhận ảnh</button><br><br>
                                        <input name="image" type="text" class="form-control" id="form-blog/image" readonly />
                                        @error('image')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="mb-4"><label for="form-blog/title" class="form-label">Title</label>
                                        <input name="title" type="text" class="form-control" id="form-blog/title" />
                                        @error('title')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-blog/slug" class="form-label">Slug</label>
                                        <input name="slug" type="text" class="form-control" id="form-blog/slug" />
                                        @error('slug')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-blog/tag" class="form-label">Tag</label>
                                        <input name="tag" type="text" class="form-control" id="form-blog/tag" />
                                        @error('tag')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-blog/short_description" class="form-label">Short_description</label>
                                        <textarea name="short_description" type="text" class="form-control" id="form-blog/short_description"></textarea>
                                        @error('short_description')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-blog/long_description" class="form-label">Long_description</label>
                                        <textarea name="long_description" rows="" cols="80" required></textarea>
                                        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace('long_description');

                                        </script>
                                        @error('long_description')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4" style="display: none"><label for="form-blog/date_time" class="form-label">Date_time</label>
                                        <textarea name="date_time" type="text" class="form-control" id="form-blog/date_time"></textarea>
                                        @error('date_time')
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
                                        <h2 class="mb-0 fs-exact-18">Visibility</h2>
                                    </div>
                                    <div class="mb-4"><label class="form-check">
                                            <input type="radio" class="form-check-input" checked name="status" value="Published" />
                                            <span class="form-check-label">Published</span>
                                        </label>

                                        <label class="form-check mb-0">
                                            <input value="draft" type="radio" class="form-check-input" wire:model.defer="status" name="status" />
                                            <span class="form-check-label">Draft</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form> --}}
</div>
@endsection
