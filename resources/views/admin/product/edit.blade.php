@extends('layout.admin')

@section('content')
    <div class="sa-app__content">
        <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" enctype="multipart/form-data" method="POST"
            class="sa-search sa-search--state--pending">
            {{ csrf_field() }}
            @csrf
            @method('PUT')
            <div id="top" class="sa-app__body">
                <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="{{ route('dashboard' ) }}">Thống kê</a></li>
                                            <li class="breadcrumb-item"><a >Sản phẩm</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Tạo sản phẩm</li>
                                        </ol>
                                    </nav>
                                    <h1 class="h3 m-0">Chỉnh sửa sản phẩm</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="{{ route('admin.product.list') }}"
                                        class="btn btn-secondary me-3">Trở về</a><button type="submit" href="#"
                                        class="btn btn-primary">Cập nhập</button></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Thông tin cơ bản</h2>
                                            </div>
                                            @if ($errors->any())
                                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                                            @endif
                                            <div class="mb-4"><label for="form-product/name"
                                                    class="form-label">Tên</label><input name="name" type="text"
                                                    class="form-control" id="form-product/name"
                                                    value="{{$product->name}}" /></div>
                                            <div class="mb-4"><label for="form-product/slug"
                                                    class="form-label">Slug</label>
                                                <div class="input-group input-group--sa-slug"><span class="input-group-text"
                                                        id="form-product/slug-addon">https://example.com/products/</span><input
                                                        name="slug" type="text" class="form-control"
                                                        id="form-product/slug"
                                                        aria-describedby="form-product/slug-addon form-product/slug-help"
                                                        value=" {{$product->slug}}" /></div>
                                                <div id="form-product/slug-help" class="form-text">Unique human-readable
                                                    product identifier. No longer than 255 characters.</div>
                                            </div>
                                            <div class="mb-4"><label for="form-product/description"
                                                    class="form-label">Mô tả</label>

                                                <textarea  name="description" rows="" cols="80" required>
                                                    {{$product->description}}
                                                </textarea>
                                              <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
                                               <script>


                                                   CKEDITOR.replace('description');
                                               </script>



                                            </div>
                                            <div><label for="form-product/short-description" class="form-label">Mô tả ngắn
                                                     </label>
                                                <textarea name="small_description" id="form-product/short-description" class="form-control" rows="2">
                                                    {{ $product->small_description }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Pricing</h2>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col"><label for="form-product/price"
                                                        class="form-label">Promotion Price</label><input
                                                        name="promotion_price" type="number" class="form-control"
                                                        value="{{ $product->promotion_price }}" id="form-product/price" />
                                                </div>
                                                <div class="col"><label for="form-product/old-price"
                                                        class="form-label">Price</label><input name="price" type="number"
                                                        class="form-control" value="{{ $product->price }}" /></div>
                                            </div>
                                            <div class="mt-4 mb-n2"><a href="#">Schedule discount</a></div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Inventory</h2>
                                            </div>
                                            <div class="mb-4"><label for="form-product/sku"
                                                    class="form-label">SKU</label><input type="text"
                                                    class="form-control" id="form-product/sku" value="SCREW150" /></div>
                                            <div class="mb-4 pt-2"><label class="form-check"><input type="checkbox"
                                                        class="form-check-input" name="hot" />
                                                    <span class="form-check-label">Trending</span></label>
                                            </div>













                                        </div>
                                        <div class="row g-4 mx-4 mb-5">
                                            <label for="form-product/quantity" class="form-label">SKU
                                                Quantity</label>


                                                <hr>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Sku Code</th>
                                                            <th>Original Price</th>
                                                            <th>Promotion Price</th>
                                                            <th>Quantity</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($skus as $sku)
                                                            <tr id="sku-row-{{$sku->id}}">
                                                                <td>{{$sku->id}}</td>
                                                                <td>{{$sku->sku_code}}</td>
                                                                <td><input type="number" name="original_price_{{$sku->id}}" value="{{$sku->original_price}}"></td>
                                                                <td><input type="number" name="promotion_price_{{$sku->id}}" value="{{$sku->promotion_price}}"></td>
                                                                <td><input type="number" name="quantity_{{$sku->id}}" value="{{$sku->quantity}}"></td>
                                                                <td>
                                                                    <button onclick="updateSku(event, {{$sku->id}})">Update</button>
                                                                    <button onclick="deleteSku(event, {{$sku->id}})">Delete</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <script>
                                                    function updateSku(event, skuId) {
                                                        event.preventDefault();
                                                        var originalPrice = document.getElementsByName("original_price_" + skuId)[0].value;
                                                        var promotionPrice = document.getElementsByName("promotion_price_" + skuId)[0].value;
                                                        var quantity = document.getElementsByName("quantity_" + skuId)[0].value;

                                                        // Gửi yêu cầu Ajax để cập nhật SKU
                                                        $.ajax({
                                                            url: '/skus/update',
                                                            type: 'POST',
                                                            data: {
                                                                sku_id: skuId,
                                                                original_price: originalPrice,
                                                                promotion_price: promotionPrice,
                                                                quantity: quantity,
                                                                _token: '{{ csrf_token() }}'
                                                            },
                                                            success: function(response) {
                                                                // Xử lý phản hồi thành công
                                                                console.log(response);
                                                            },
                                                            error: function(xhr) {
                                                                // Xử lý lỗi
                                                                console.log(xhr.responseText);
                                                            }
                                                        });
                                                    }

                                                    function deleteSku(event, skuId) {
                                                        event.preventDefault();

                                                        // Gửi yêu cầu Ajax để xóa SKU
                                                        $.ajax({
                                                            url: '/skus/delete/' + skuId,
                                                            type: 'POST',
                                                            data: {
                                                                _token: '{{ csrf_token() }}'
                                                            },
                                                            success: function(response) {
                                                                // Xử lý phản hồi thành công
                                                                console.log(response);
                                                                // Xóa dòng (row) tương ứng trong bảng HTML
                                                                var skuRow = document.getElementById('sku-row-' + skuId);
                                                                if (skuRow) {
                                                                    skuRow.remove();
                                                                }
                                                            },
                                                            error: function(xhr) {
                                                                // Xử lý lỗi
                                                                console.log(xhr.responseText);
                                                            }
                                                        });
                                                    }
                                                </script>
                                        <div class="">



                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Images</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="sa-divider"></div>
                                            <div class="table-responsive">
                                                <input hidden name="images[]" id="fileInput" type="file" multiple>
                                                <table class="sa-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="w-min">Image</th>
                                                            <th class="min-w-10x">Alt text</th>
                                                            <th class="w-min">Order</th>
                                                            <th class="w-min"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($images as $img)
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                                        <img src="{{ asset('storage/' . $img->image) }}"
                                                                            width="100px" height="100px"
                                                                            alt="" />
                                                                    </div>
                                                                </td>
                                                                <td><input type="text"
                                                                        class="form-control form-control-sm" />
                                                                </td>
                                                                <td><input type="number"
                                                                        class="form-control form-control-sm w-4x"
                                                                        value="0" /></td>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('admin.images.delete', ['id' => $img->id]) }}">
                                                                        <button class="btn btn-sa-muted btn-sm mx-n3"
                                                                            type="button" aria-label="Delete image"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="right"
                                                                            title="Delete image"><svg
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                width="12" height="12"
                                                                                viewBox="0 0 12 12" fill="currentColor">
                                                                                <path
                                                                                    d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4 C11.2,9.8,11.2,10.4,10.8,10.8z">
                                                                                </path>
                                                                            </svg></button>
                                                                    </a>

                                                                </td>
                                                            </tr>
                                                        @empty
                                                        @endforelse


                                                    </tbody>
                                                    @if (Session::has('message'))
                                                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                                                    @endif
                                                </table>
                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2"><label for="fileInput">Upload new image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Search engine optimization</h2>
                                                <div class="mt-3 text-muted">Provide information that will help improve the
                                                    snippet and bring your product to the top of search engines.</div>
                                            </div>
                                            <div class="mb-4"><label for="form-product/seo-title"
                                                    class="form-label">Meta Keyword</label><input
                                                    value="{{ $product->meta_keyword }}" name="meta_keyword"
                                                    type="text" class="form-control" id="form-product/seo-title" />
                                            </div>
                                            <div><label for="form-product/seo-description" class="form-label">Meta
                                                    description</label>
                                                <textarea name="meta_description" id="form-product/seo-description" class="form-control" rows="2">{{ $product->meta_description }}


                                                </textarea>
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
                                                    class="form-check-input"
                                                    {{ $product->status == 'published' ? 'checked' : '' }}
                                                    value="published" name="status" /><span
                                                    class="form-check-label">Published</span></label><label
                                                class="form-check"><input type="radio" class="form-check-input"
                                                    {{ $product->status == 'scheduled' ? 'checked' : '' }}
                                                    value="scheduled" name="status" /><span
                                                    class="form-check-label">Scheduled</span></label>
                                            <label class="form-check mb-0"><input type="radio"
                                                    class="form-check-input" value="hidden"
                                                    {{ $product->status == 'hidden' ? 'checked' : '' }}
                                                    name="status" /><span
                                                    class="form-check-label">Hidden</span></label>
                                        </div>
                                        <div>
                                            <label for="form-product/seo-title" class="form-label">Publish
                                                date</label><input name="publish_date"
                                                value="{{ $product->publish_date }}" type="text"
                                                class="form-control datepicker-here" id="form-product/publish-date"
                                                data-auto-close="true" data-language="en" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-100 mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Sub Category</h2>
                                        </div>
                                        <select name="sub_category_id" class="sa-select2 form-select">
                                            @foreach ($sub_categories as $cate)

                                                <option {{ $cate->id == $product->sub_category_id ? 'selected' : '' }}
                                                    value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach ()


                                        </select>
                                        <div class="mt-4 mb-n2"><a href="#">Add new category</a></div>
                                    </div>
                                </div>
                                <div class="card w-100 mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Brands</h2>
                                        </div>
                                        <select name="brand_id" class="sa-select2 form-select">
                                            @foreach ($brands as $brand)
                                                <option
                                                {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                                                value="{{$brand->id}}">{{ $brand->name }}</option>
                                            @endforeach ()


                                        </select>
                                        <div class="mt-4 mb-n2"><a href="#">Add new category</a></div>
                                    </div>
                                </div>
                                {{-- <div class="card w-100 mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Brands</h2>
                                        </div>
                                        <select name="brand_id" class="sa-select2 form-select">
                                            @foreach ($brands as $brand)
                                                <option  value="{{$brand->id}}">{{ $brand->name }}</option>
                                            @endforeach ()


                                        </select>
                                        <div class="mt-4 mb-n2"><a href="#">Add new Brand</a></div>
                                    </div>
                                </div> --}}
                                <div class="card w-100 mt-5">
                                    <div class="card-body p-5">
                                        <div class="mb-5">
                                            <h2 class="mb-0 fs-exact-18">Tags</h2>
                                        </div><select class="sa-select2 form-select" data-tags="true" multiple="">
                                            <option selected="">Universe</option>
                                            <option selected="">Sputnik</option>
                                            <option selected="">Steel</option>
                                            <option selected="">Rocket</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>




    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function submitChildForm(event) {

            event.preventDefault(); // Ngăn chặn hành vi gửi mặc định của form cha

            // Sử dụng Ajax để gửi form con
           var id =  event.target.value
           var qty = $('#p_c_q').val()
            $.ajax({
                url: '/update-pcolor',

                type: 'POST',
                datatype: 'jsonp',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "qty":  qty
                },
                success: function(response) {
                    console.log(response)
                    // $('#p_c_q').val()
                },
                error: function(xhr) {
                    // Xử lý lỗi nếu có
                }
            });
        }
        function deleteChildForm(event) {
            $('#product_color_' + event.target.value ).remove()
            event.preventDefault(); // Ngăn chặn hành vi gửi mặc định của form cha

            // Sử dụng Ajax để gửi form con
           var id =  event.target.value
            $.ajax({
                url: '/delete-pcolor',

                type: 'DELETE',
                datatype: 'jsonp',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,

                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    // Xử lý lỗi nếu có
                }
            });
        }
    </script>
@endsection
