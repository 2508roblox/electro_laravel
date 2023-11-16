@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Database</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Database</h1>
                        </div>
                    </div>
                </div>
                <div class="row g-4">

                    @foreach ($tableNames as $tableName)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card text-center"><a
                                    href="{{ route('admin.database.detail', ['id' => current($tableName)]) }}"
                                    class="text-reset p-5 text-decoration-none sa-hover-area">
                                    <div class="fs-4 mb-4 text-muted opacity-50"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-box">
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                            </path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg></div>
                                    <h2 class="fs-6 fw-medium mb-3">{{ current($tableName) }}</h2>
                                    <div class="text-muted fs-exact-14">Mathematics began to develop at an accelerating pace
                                    </div>
                                </a></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
