@extends('layout.admin')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div id="top" class="sa-app__body">
    <form id="form" method="POST" action="{{route('admin.brand.store')}}">
        @csrf
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="app-Brand-list.html">Brand</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create brand</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit brand</h1>
                        </div>
                        <div class="col-auto d-flex"><a href="{{ route('admin.brand.list') }}"
                                class="btn btn-secondary me-3">Back</a><button type="submit" id="submit_button"  href="#"
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
                                    <div class="mb-4"><label for="form-brand/name" class="form-label">Name</label>
                                        <input  name="name"  type="text" class="form-control"
                                            id="form-brand/name" />
                                            @error('name')
                                               {{$message}}
                                            @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-brand/slug" class="form-label">Slug</label>
                                        <div class="input-group input-group--sa-slug"><span class="input-group-text"
                                                id="form-brand/slug-addon">https://example.com/catalog/</span><input
                                                name="slug"
                                                  type="text" class="form-control"
                                                id="form-brand/slug"
                                                aria-describedby="form-brand/slug-addon form-brand/slug-help" />
                                                @error('slug')
                                                {{$message}}
                                             @enderror
                                        </div>
                                        <div id="form-brand/slug-help" class="form-text">Unique human-readable
                                            brand identifier. No longer than 255 characters.</div>
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
                                                class="form-check-input" checked  name="status" value="published" /><span
                                                class="form-check-label">Published</span></label>

                                        <label class="form-check mb-0"><input value="hidden" type="radio"
                                                class="form-check-input" wire:model.defer="status" name="status" /><span
                                                class="form-check-label">Hidden</span></label>
                                    </div>

                                </div>
                            </div>
                            <div class="card w-100 mt-5">
                                <div class="card-body p-5">


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>


@endsection
