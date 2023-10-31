@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        <form id="form" action="{{ route('admin.slider.update', ['id' => $slider->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
            <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                <div class="container container--max--xl">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <nav class="mb-2" aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-sa-simple">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="app-categories-list.html">Categories</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit slider</li>
                                    </ol>
                                </nav>
                                <h1 class="h3 m-0">Edit slider</h1>
                            </div>
                            <div class="col-auto d-flex"><a href="{{ route('admin.slider.list') }}"
                                    class="btn btn-secondary me-3">Back</a><button id="submit_button" type="submit"
                                    class="btn btn-primary">Save</button></div>
                        </div>
                    </div>
                    <div class="sa-entity-layout"
                        data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                        <div class="sa-entity-layout__body">
                            <div class="sa-entity-layout__main">
                                <div class="card">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                        </div>
                                        <div class="mb-4"><label for="form-slider/name" class="form-label">Title</label>
                                            <input value="{{ $slider->title }}" name="title" type="text"
                                                class="form-control" id="form-slider/name" />
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="mb-4"><label for="form-slider/description"
                                                class="form-label">Description</label>
                                    
                                            <textarea  name="description" rows="" cols="80" required>
                                                {{$slider->description}}
                                            </textarea>
                                          <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
                                           <script>


                                               CKEDITOR.replace('description');
                                           </script>


                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="card w-100 mt-5">
                                            <div class="card-body p-5">
                                                <div class="mb-5">
                                                    <h2 class="mb-0 fs-exact-18">Image</h2>
                                                </div>
                                                <label for="cateImg">
                                                    <div class="border p-4 d-flex justify-content-center">
                                                        <div class="max-w-20x"><img id="img_preview"
                                                                src="{{ $slider->image ? asset('storage/' . $slider->image) : asset('admin/images/products/product-7-320x320.jpg') }}"
                                                                class="w-100 h-auto" width="320" height="320"
                                                                alt="" /></div>
                                                    </div>

                                                </label>

                                                <input hidden id="cateImg" type="file" name="image">
                                                @error('image')
                                                    {{ $message }}
                                                @enderror
                                                <div class="mt-4 mb-n2"><a href="#" class="me-3 pe-2">Replace
                                                        image</a><a href="#" class="text-danger me-3 pe-2">Remove
                                                        image</a></div>
                                                <script>
                                                    document.getElementById('cateImg').addEventListener('change', function(e) {
                                                        var output = document.getElementById('img_preview');
                                                        output.src = URL.createObjectURL(e.target.files[0]);
                                                        output.onload = function() {
                                                            URL.revokeObjectURL(output.src) // free memory
                                                        }

                                                    })
                                                    document.getElementById('submit_button').addEventListener('click', function(e) {
                                                        document.getElementById('form').submit()
                                                    })
                                                </script>
                                            </div>
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
                                        <div class="mb-4"><label class="form-check"><input type="radio"
                                                    class="form-check-input" name="status" checked=""
                                                    value="published" /><span
                                                    class="form-check-label">Published</span></label>
                                            <label class="form-check mb-0"><input value="hidden" type="radio"
                                                    class="form-check-input" name="status" /><span
                                                    class="form-check-label">Hidden</span></label>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>

    <script>

</script>

@endsection
