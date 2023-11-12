@extends('layout.admin')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div id="top" class="sa-app__body">
    <form id="form" method="POST" action="{{route('admin.user.store')}}">
        @csrf
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="app-Brand-list.html">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create user</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit user</h1>
                        </div>
                        <div class="col-auto d-flex"><a href="{{ route('admin.user.list') }}"
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
                                    <div class="mb-4">
                                        <label for="form-user/email" class="form-label">Email</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="email" type="email" class="form-control" id="form-user/email" />
                                            @error('email')
                                               {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-user/password" class="form-label">Password</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="password" type="password" class="form-control" id="form-user/password" />
                                            @error('password')
                                               {{$message}}
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Role</h2>
                                    </div>
                                    <div class="mb-4"><label class="form-check"><input type="radio"
                                                class="form-check-input" checked  name="role_as" value="1" /><span
                                                class="form-check-label">Admin</span></label>

                                        <label class="form-check mb-0"><input value="hidden" type="radio"
                                                class="form-check-input" wire:model.defer="role_as" name="role_as" value="0"/><span
                                                class="form-check-label">Customer</span></label>
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
