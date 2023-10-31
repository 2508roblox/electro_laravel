@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        <form id="form" action="{{ route('admin.category.update',['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                <div class="container container--max--xl">
                    <div class="py-5">
                        <div class="row g-4 align-items-center">
                            <div class="col">
                                <nav class="mb-2" aria-label="breadcrumb">
                                    <ol class="breadcrumb breadcrumb-sa-simple">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="app-categories-list.html">Categories</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                                    </ol>
                                </nav>
                                <h1 class="h3 m-0">Edit Category</h1>
                            </div>
                            <div class="col-auto d-flex"><a href="{{ route('admin.category.list') }}"
                                    class="btn btn-secondary me-3">Back</a><a id="submit_button"  href="#"
                                    class="btn btn-primary">Save</a></div>
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
                                        <div class="mb-4"><label for="form-category/name" class="form-label">Name</label>
                                            <input name="name" type="text" class="form-control"
                                                id="form-category/name" value=" {{$category->name}}" />
                                                @error('name')
                                                {{$message}}
                                             @enderror
                                        </div>
                                        <div class="mb-4"><label for="form-category/slug" class="form-label">Slug</label>
                                            <div class="input-group input-group--sa-slug"><span class="input-group-text"
                                                    id="form-category/slug-addon">https://example.com/catalog/</span><input
                                                    name="slug" type="text" class="form-control"
                                                    id="form-category/slug" value="{{$category->slug}}"
                                                    aria-describedby="form-category/slug-addon form-category/slug-help" />
                                                    @error('slug')
                                                    {{$message}}
                                                 @enderror
                                            </div>
                                            <div id="form-category/slug-help" class="form-text">Unique human-readable
                                                category identifier. No longer than 255 characters.</div>
                                        </div>
                                        <div class="mb-4"><label for="form-category/description"
                                                class="form-label">Description</label>
                                            <textarea  name="description" id="form-category/description" class="sa-quill-control form-control" rows="8">
                                            {{$category->description}}
                                            </textarea>
                                            @error('description')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                            <div class="mt-3 text-muted">Provide information that will help improve the
                                                snippet and bring your category to the top of search engines.</div>
                                        </div>
                                        <div class="mb-4"><label for="form-category/seo-title" class="form-label">Page
                                                title</label><input name="title" type="text" class="form-control"
                                                id="form-category/seo-title" value="{{$category->title}}" />
                                                @error('title')
                                                {{$message}}
                                             @enderror
                                            </div>
                                        <div><label for="form-category/seo-description" class="form-label">Meta
                                                description</label>
                                            <textarea name="seo_description" id="form-category/seo-description" class="form-control" rows="2">
                                                {{$category->seo_description}}</textarea>
                                                @error('seo_description')
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
                                        <div class="mb-4"><label class="form-check"><input type="radio"
                                                    class="form-check-input" name="status" @php
                                                        $category->status == 'published' ? 'checked' :''
                                                    @endphp  value="published" /><span
                                                    class="form-check-label">Published</span></label><label
                                                class="form-check"><input @php
                                                $category->status == 'scheduled' ? 'checked' :''
                                            @endphp

                                            type="radio" class="form-check-input"
                                                    name="status" checked="" value="scheduled" /><span
                                                    class="form-check-label">Scheduled</span></label>
                                            <label class="form-check mb-0"><input
                                                @php
                                                        $category->status == 'hidden' ? 'checked' :''
                                                    @endphp
                                                value="hidden" type="radio"
                                                    class="form-check-input" name="status" /><span
                                                    class="form-check-label">Hidden</span></label>
                                        </div>
                                        <div><label for="form-category/seo-title" class="form-label">Publish
                                                date</label><input value=" {{$category->publish_date}}" name='publish_date' type="text"
                                                class="form-control datepicker-here" id="form-category/publish-date"
                                                data-auto-close="true" data-language="en" />
                                            <div class="form-text">The category will not be visible until the specified
                                                date.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-100 mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Parent category</h2>
                                        </div><select class="sa-select2 form-select">
                                            <option>[None]</option>
                                            <option selected="">Tools</option>
                                            <option>Screwdrivers</option>
                                            <option>Chainsaws</option>
                                            <option>Hand tools</option>
                                            <option>Machine tools</option>
                                            <option>Power machinery</option>
                                            <option>Measurements</option>
                                            <option>Power tools</option>
                                        </select>
                                        <div class="form-text">Select a category that will be the parent of the current
                                            one.</div>
                                    </div>
                                </div>
                                <div class="card w-100 mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Image</h2>
                                        </div>
                                        <label for="cateImg">
                                            <div class="border p-4 d-flex justify-content-center">
                                                <div class="max-w-20x"><img id="img_preview"
                                                        src="{{$category->image ? asset('storage/' . $category->image) :asset('admin/images/products/product-7-320x320.jpg') }}"
                                                        class="w-100 h-auto" width="320" height="320"
                                                        alt="" /></div>
                                            </div>

                                        </label>

                                        <input hidden id="cateImg" type="file" name="image">
                                        <div class="mt-4 mb-n2"><a href="#" class="me-3 pe-2">Replace image</a><a
                                                href="#" class="text-danger me-3 pe-2">Remove image</a></div>
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
                </div>
        </form>
    </div>
    </div>
@endsection
