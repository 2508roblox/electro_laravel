@extends('layout.admin')
@section('content')
<div id="top" class="sa-app__body">
    <form id="form" method="POST" action="">
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.blog.comment') }}">Comment</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit comment</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit Comment</h1>
                        </div>
                        <div class="col-auto d-flex"><a href="{{ route('admin.blog.comment') }}" class="btn btn-secondary me-3">Back</a>
                            <button type="submit" id="submit_button" href="#" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout" data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body" method="POST">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                      
                                    </div>
                                    <div class="mb-4"><label for="form-comment/id" class="form-label">ID</label>
                                        <input name="id" type="text" class="form-control" value="{{ $comment->id }}" id="form-comment/id" readonly />
                                        @error('id')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-comment/blog_id" class="form-label">Blog ID</label>
                                        <input name="blog_id" type="text" class="form-control" value="{{ $comment->blog_id }}" id="form-comment/blog_id" readonly/>
                                        @error('blog_id')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-comment/user_id" class="form-label">User Name (ID)</label>
                                        <input name="user_id" type="text" class="form-control" value="{{ $comment->user->name }} ({{ $comment->user_id }})" id="form-comment/user_id" readonly/>
                                        @error('user_id')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-comment/content" class="form-label">Content</label>
                                        <textarea name="content" type="text" class="form-control" value="{{ $comment->content }}" id="form-comment/content">{{ $comment->content }}</textarea>
                                        @error('content')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-comment/status" class="form-label">Status (By User)</label>
                                        <div class="input-group input-group--sa-slug">
                                            <select name="status" class="sa-select2 form-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="show" data-select2-id="1" {{ $comment->status == 'show' ? 'selected' : '' }}>Show</option>
                                                <option value="hide" data-select2-id="23" {{ $comment->status == 'hide' ? 'selected' : '' }}>Hide</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-comment/is_accept" class="form-label">Accept?</label>
                                        <div class="input-group input-group--sa-slug">
                                            <select name="is_accept" class="sa-select2 form-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option value="accepted" data-select2-id="1" {{ $comment->is_accept == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="not accepted" data-select2-id="23" {{ $comment->is_accept == 'not accepted' ? 'selected' : '' }}>Not accepted</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-comment/is_deleted" class="form-label">User Deleted</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="is_deleted" value="{{ $comment->is_deleted }}" type="is_deleted" class="form-control" id="form-comment/is_deleted" readonly/>
                                            @error('is_deleted')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-comment/ip_address" class="form-label">IP Address</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="ip_address" value="{{ $comment->ip_address }}" type="ip_address" class="form-control" id="form-comment/ip_address" readonly/>
                                            @error('ip_address')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-comment/report_count" class="form-label">Report</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="report_count" value="{{ $comment->report_count }}" type="report_count" class="form-control" id="form-comment/report_count" />
                                            @error('report_count')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-comment/created_at" class="form-label">Date create</label>
                                        <div class="input-group input-group--sa-slug">
                                            <input name="created_at" value="{{ $comment->created_at }}" type="created_at" class="form-control" id="form-comment/created_at" readonly/>
                                            @error('created_at')
                                            {{$message}}
                                            @enderror
                                        </div>
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
