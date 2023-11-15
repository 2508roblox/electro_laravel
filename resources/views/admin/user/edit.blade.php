@extends('layout.admin')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div id="top" class="sa-app__body">
    <form id="form" method="POST" action="{{route('admin.user.update', ['id'=> $user->id])}}">
        
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.user.list') }}">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit user</li>
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
                    <div class="sa-entity-layout__body" method="POST">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Basic information</h2>
                                    </div>
                                    <div class="mb-4"><label for="form-user/id" class="form-label">ID</label>
                                        <input  name="id"  type="text" class="form-control" value="{{$user->id}}" id="form-user/id" readonly/>
                                            @error('id')
                                               {{$message}}
                                            @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-user/name" class="form-label">Name</label>
                                        <input  name="name"  type="text" class="form-control" value="{{$user->name}}" id="form-user/name" />
                                            @error('name')
                                               {{$message}}
                                            @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-user/email" class="form-label">Email</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="email" value="{{$user->email}}" type="email" class="form-control" id="form-user/email" />
                                            @error('email')
                                               {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-user/created_at" class="form-label">Date create</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="created_at" value="{{$user->created_at}}" type="created_at" class="form-control" id="form-user/created_at" />
                                            @error('created_at')
                                               {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-user/wallet" class="form-label">Wallet</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="wallet" value="{{ optional($user->wallet)->balance ?? '' }}" type="text" class="form-control" id="form-user/wallet" maxlength="8" limit="8"/>
                                            @error('wallet')
                                               {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-user/status" class="form-label">Status</label>
                                        <div class="input-group input-group--sa-slug">
                                            <select name="status" class="sa-select2 form-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="active" data-select2-id="1" {{ $user->email_verified_at != null ? 'selected' : '' }}>Active</option>
                                                <option value="inactive" data-select2-id="23" {{ $user->email_verified_at == null ? 'selected' : '' }}>Inactive</option>
                                            </select>
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
                                    <div class="mb-4">
                                        <label class="form-check">
                                            <input type="radio" class="form-check-input" {{ $user->role_as == 1 ? 'checked' : '' }} name="role_as" value="1" />
                                            <span class="form-check-label">Admin</span>
                                        </label>
                                        <label class="form-check mb-0">
                                            <input {{ $user->role_as == 0 ? 'checked' : '' }} value="0" type="radio" class="form-check-input" name="role_as" />
                                            <span class="form-check-label">Customer</span>
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
