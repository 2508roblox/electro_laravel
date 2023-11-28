@extends('layout.admin')

@section('content')
    <div class="sa-app__content">
        <form action="{{ route('admin.product.store') }}" enctype="multipart/form-data" id="create-product-form" method="POST"
            class="sa-search sa-search--state--pending">
            @csrf
            <input type="text" name="id" hidden value="{{ $latestProductId }}">
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
                                    <h1 class="h3 m-0">Tạo sản phẩm</h1>
                                </div>
                                <div class="col-auto d-flex"><a href="#"
                                    class="btn btn-secondary me-3">Trở về</a><button type="submit" href="#"
                                    class="btn btn-primary">Tạo</button></div>
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
                                                    value="Brandix Screwdriver SCREW150" /></div>
                                            <div class="mb-4"><label for="form-product/slug"
                                                    class="form-label">Slug</label>
                                                <div class="input-group input-group--sa-slug"><span class="input-group-text"
                                                        id="form-product/slug-addon">https://example.com/products/</span><input
                                                        name="slug" type="text" class="form-control"
                                                        id="form-product/slug"
                                                        aria-describedby="form-product/slug-addon form-product/slug-help"
                                                        value="brandix-screwdriver-screw150" /></div>
                                                <div id="form-product/slug-help" class="form-text">Unique human-readable
                                                    product identifier. No longer than 255 characters.</div>
                                            </div>
                                            <div class="mb-4"><label for="form-product/description"
                                                    class="form-label">Mô tả</label>

                                                <textarea name="description" rows="" cols="80" required>

                                                    </textarea>
                                                <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
                                                <script>
                                                    CKEDITOR.replace('description');
                                                </script>




                                            </div>
                                            <div><label for="form-product/short-description" class="form-label">Mô tả ngắn
                                                    </label>
                                                <textarea name="small_description" id="form-product/short-description" class="form-control" rows="2"></textarea>
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
                                                        id="form-product/price" value="1499" />
                                                </div>
                                                <div class="col"><label for="form-product/old-price"
                                                        class="form-label">Price</label><input name="price" type="number"
                                                        class="form-control" id="form-product/old-price" /></div>
                                            </div>
                                            <div class="mt-4 mb-n2"><a href="#">Schedule discount</a></div>
                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-4 pt-2">

                                                <label class="form-check"><input type="checkbox"
                                                class="form-check-input" name="hot" />
                                            <span class="form-check-label">Trending</span></label>



                                            </div>

                                            <hr>



                                        </div>
                                    </div>
                                    <div class="card mt-5">
                                        <div class="card-body p-5" id="parent-variant">

                                                <div class="form-group">
                                                    <label for="variants">Choose Variant:</label>
                                                    <select class="form-control" name="variants" id="variants">
                                                        @foreach ($variants as $variant)
                                                            <option value="{{ $variant->id }}">{{ $variant->value }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-primary createVariantDiv">Create Variant Div</button>
                                                </div>

                                            <div id="variant-container">
                                                <!-- Các div con đã tồn tại sẽ được hiển thị ở đây -->
                                            </div>
                                            <div id="create-container">
                                                <!-- Các div con đã tồn tại sẽ được hiển thị ở đây -->
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="saved-data-input" name="savedData" value="">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                        $(document).ready(function() {

                                            $('#create-product-form').on('submit', function(event) {
                                                var data = saveData();
                                                console.log(data);
                                                $.ajax({
                                                    url: '/skus/create',
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        "data": data,
                                                        "product_id": {{ $latestProductId }}
                                                    },
                                                    success: function(response) {
                                                        console.log(response);


                                                    },
                                                    error: function(xhr) {
                                                        // Xử lý lỗi nếu có

                                                    }
                                                });
                                            });

                                            function saveData() {
                                                var data = [];

                                                var table = document.getElementById('variants-table');
                                                var rows = table.getElementsByTagName('tr');
                                                for (var i = 1; i < rows.length; i++) {
                                                    var row = rows[i];
                                                    var inputs = row.getElementsByTagName('input');
                                                    var cellId = row.getElementsByTagName('td');
                                                    // obj of each
                                                    var values = {};
                                                    console.log(cellId[0].id)

                                                    var index = 0;
                                                    let tempIdArr = []
                                                    while (index < inputs.length && cellId[index].id) {
                                                        var id = cellId[index].id;
                                                        tempIdArr.push(id);
                                                        index++;
                                                    }
                                                    values.variant_value_id = tempIdArr
                                                    for (var j = 0; j < inputs.length; j++) {
                                                        switch (j) {
                                                            case 0:
                                                                values.sku = inputs[j].value
                                                                break;
                                                            case 1:
                                                                values.quantity = inputs[j].value
                                                                break;
                                                            case 2:
                                                                values.price = inputs[j].value
                                                                break;

                                                            default:
                                                                values.promotion = inputs[j].value

                                                                break;
                                                        }
                                                    }


                                                    data.push(values);
                                                }

                                                return data;
                                            }
                                            $('#parent-variant').on('click', '.createVariantDiv', function(event) {
                                                event.preventDefault();
                                                var selectedVariant = $('#variants').val();
                                                var variantName = $('#variants option:selected').text();
                                                if ($('#variant-container').find('#' + selectedVariant).length === 0) {
                                                    var variantDiv = $('<div>').attr('id', selectedVariant).attr('class', 'variant-div');
                                                    var variantNameElement = $('<h3>').text(variantName);
                                                    variantDiv.append(variantNameElement);
                                                    var variantInput = $('<input>').attr('type', 'text').attr('class', 'variantValue').attr(
                                                        'name', selectedVariant);
                                                    variantDiv.append(variantInput);
                                                    var createVariantValueButton = $('<button>').text('Create Variant Value').attr('class',
                                                        'createVariantValueButton');
                                                    createVariantValueButton.click(submitChildForm);
                                                    variantDiv.append(createVariantValueButton);
                                                    $('#variant-container').append(variantDiv);
                                                }
                                            });
                                            $('#variant-container').on('click', '.createVariantValueButton', function(event) {
                                                var variantDiv = $(this).closest(this).parent('.variant-div');
                                                console.log(variantDiv)
                                                var variantInput = variantDiv.find('.variantValue').last();
                                                var variantValue = variantInput.val();
                                                event.preventDefault();
                                                $(this).prop('disabled', true);
                                                $.ajax({
                                                    url: '/variants/value/create',
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        "id": variantDiv.attr('id'),
                                                        "name": variantInput.val(),
                                                        "product_id": {{ $latestProductId }}
                                                    },
                                                    success: function(response) {
                                                        console.log(response);

                                                        var createContainer = document.getElementById('create-container');

                                                        // Tạo bảng
                                                        var table = document.createElement('table');
                                                        table.className = 'table';
                                                        table.setAttribute("id", "variants-table");
                                                        // Tạo tiêu đề cột
                                                        var thead = document.createElement('thead');
                                                        var headerRow = document.createElement('tr');

                                                        // Lặp qua các variant_id để tạo tiêu đề cột
                                                        response[0].forEach(function(item) {
                                                            var variantHeader = document.createElement('th');
                                                            variantHeader.scope = 'col';
                                                            variantHeader.innerHTML = 'Variant ' + item.variant_id;
                                                            headerRow.appendChild(variantHeader);
                                                        });

                                                        // Tạo tiêu đề cột cho các thông tin khác
                                                        var valueHeader = document.createElement('th');
                                                        valueHeader.scope = 'col';
                                                        valueHeader.innerHTML = 'SKU';
                                                        headerRow.appendChild(valueHeader);

                                                        var quantityHeader = document.createElement('th');
                                                        quantityHeader.scope = 'col';
                                                        quantityHeader.innerHTML = 'Quantity';
                                                        headerRow.appendChild(quantityHeader);

                                                        var priceHeader = document.createElement('th');
                                                        priceHeader.scope = 'col';
                                                        priceHeader.innerHTML = 'Price';
                                                        headerRow.appendChild(priceHeader);

                                                        var promotionPriceHeader = document.createElement('th');
                                                        promotionPriceHeader.scope = 'col';
                                                        promotionPriceHeader.innerHTML = 'Promotion Price';
                                                        headerRow.appendChild(promotionPriceHeader);

                                                        // Thêm tiêu đề cột vào thead
                                                        thead.appendChild(headerRow);
                                                        table.appendChild(thead);

                                                        // Tạo tbody và lặp qua các hàng
                                                        var tbody = document.createElement('tbody');
                                                        response.forEach(function(combination) {
                                                            var row = document.createElement('tr');

                                                            // Lặp qua các mục trong kết hợp
                                                            combination.forEach(function(item) {
                                                                var variantCell = document.createElement('td');
                                                                variantCell.innerHTML = decodeURIComponent(item
                                                                    .value
                                                                ); // Sử dụng giá trị tương ứng trong item
                                                                variantCell.setAttribute("id", item.id);
                                                                row.appendChild(variantCell);
                                                            });

                                                            // Tạo các ô cho các thông tin khác
                                                            // ...

                                                            // Tạo các ô cho các thông tin khác
                                                            var valueCell = document.createElement('td');
                                                            var valueInput = document.createElement('input');
                                                            valueInput.type = 'text';
                                                            valueInput.name = 'sku';
                                                            valueCell.appendChild(valueInput);

                                                            var quantityCell = document.createElement('td');
                                                            var quantityInput = document.createElement('input');
                                                            quantityInput.type = 'number';
                                                            quantityInput.name = 'quantity';
                                                            quantityCell.appendChild(quantityInput);

                                                            var priceCell = document.createElement('td');
                                                            var priceInput = document.createElement('input');
                                                            priceInput.type = 'text';
                                                            priceInput.name = 'price';
                                                            priceCell.appendChild(priceInput);

                                                            var promotionPriceCell = document.createElement('td');
                                                            var promotionPriceInput = document.createElement('input');
                                                            promotionPriceInput.type = 'text';
                                                            promotionPriceInput.name = 'promotion_price';
                                                            promotionPriceCell.appendChild(promotionPriceInput);

                                                            // ...
                                                            row.appendChild(valueCell);
                                                            row.appendChild(quantityCell);
                                                            row.appendChild(priceCell);
                                                            row.appendChild(promotionPriceCell);

                                                            // Thêm hàng vào tbody
                                                            tbody.appendChild(row);
                                                        });

                                                        // Thêm tbody vào bảng
                                                        table.appendChild(tbody);

                                                        // Thêm bảng vào phần tử có id "create-container"
                                                        createContainer.innerHTML = '';
                                                        createContainer.appendChild(table);

                                                        // Thêm bảng vào phần tử 'create-container'
                                                        variantInput.prop('disabled', false);
                                                        variantDiv.find('.createVariantValueButton').prop('disabled', false);

                                                        var newVariantInput = $('<input>').attr('type', 'text').attr('class',
                                                            'variantValue').attr('name', variantDiv.attr('id'));
                                                        variantDiv.find('.variantValue').last().after(newVariantInput);
                                                        variantDiv.find('.variantValue').not(newVariantInput).prop('disabled',
                                                            true);
                                                    },
                                                    error: function(xhr) {
                                                        // Xử lý lỗi nếu có
                                                        variantInput.prop('disabled', false);
                                                        variantDiv.find('.createVariantValueButton').prop('disabled', false);
                                                    }
                                                });
                                            });

                                            function submitChildForm(event) {
                                                event.preventDefault();
                                                // Thực hiện các hành động khi nhấp vào nút "Create Variant Value"
                                            }
                                        });
                                    </script>
                                    <div class="card mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Hình ảnh</h2>
                                            </div>
                                        </div>
                                        <div class="mt-n5">
                                            <div class="sa-divider"></div>
                                            <div class="table-responsive">
                                                <input name="images[]" hidden type="file" id="upload_media" multiple>

                                            </div>
                                            <div class="sa-divider"></div>
                                            <div class="px-5 py-4 my-2"><a href="#">
                                                <label for="upload_media">Tải lên ảnh mới</label>
                                                </a></div>
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
                                                    class="form-label">Meta Keyword</label><input name="meta_keyword"
                                                    type="text" class="form-control" id="form-product/seo-title" />
                                            </div>
                                            <div><label for="form-product/seo-description" class="form-label">Meta
                                                    description</label>
                                                <textarea name="meta_description" id="form-product/seo-description" class="form-control" rows="2"></textarea>
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
                                                        class="form-check-input" value="published" name="status" /><span
                                                        class="form-check-label">Published</span></label><label
                                                    class="form-check"><input type="radio" class="form-check-input"
                                                        value="scheduled" name="status" checked="" /><span
                                                        class="form-check-label">Scheduled</span></label>
                                                <label class="form-check mb-0"><input type="radio"
                                                        class="form-check-input" value="hidden" name="status" /><span
                                                        class="form-check-label">Hidden</span></label>
                                            </div>
                                            <div>
                                                <label for="form-product/seo-title" class="form-label">Publish
                                                    date</label><input name="publish_date" type="text"
                                                    class="form-control datepicker-here" id="form-product/publish-date"
                                                    data-auto-close="true" data-language="en" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">Categories</h2>
                                            </div>
                                            <select name="sub_category_id" class="sa-select2 form-select">
                                                @foreach ($sub_categories as $sub_category)
                                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}
                                                    </option>
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
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
            </div>
        </form>

    </div>
@endsection
