@extends('layout.admin')

@section('content')
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Variant</li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">Variant</h1>
                    </div>
                    <div class="col-auto d-flex"><a href="{{route('admin.variants.create')}}" class="btn btn-primary">New Variants</a></div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Start typing to search for categories" class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]" data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="w-min" data-orderable="false"><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></th>
                            <th class="min-w-15x">Id</th>
                            <th class="min-w-15x">Name</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless(count($variants) == 0)
                      @foreach ($variants as $variant)
                      <tr>
                        <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></td>
                        <td><a href="app-category.html" class="text-reset">{{$variant->id}}</a></td>
                        <td><a href="app-category.html" class="text-reset">{{$variant->value}}</a></td>

                        <td>
                            <div class="dropdown"><button class="btn btn-sa-muted btn-sm" type="button" id="category-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor"><path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"></path></svg></button>
                                <ul
                                    class="dropdown-menu dropdown-menu-end" aria-labelledby="category-context-menu-0">
                                    <li><a class="dropdown-item" href="{{route('admin.variants.edit',['id' => $variant->id])}}">Edit</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <form action="{{route('admin.variants.delete', ['id' => $variant->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button   type="submit" class="dropdown-item text-danger">Delete </button>
                                        </form>

                                    </li>
                                    </ul>
                            </div>
                        </td>
                    </tr>


                      @endforeach
                      @else
                      @endunless
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
