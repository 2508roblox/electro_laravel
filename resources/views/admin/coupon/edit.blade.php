@extends('layout.admin')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div id="top" class="sa-app__body">
    <form id="form" method="POST" action="{{route('admin.coupon.update', ['id' => $coupon->id])}}">
        @csrf
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="app-coupon-list.html">coupon</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create coupon</li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit coupon</h1>
                        </div>
                        <div class="col-auto d-flex"><a href="{{ route('admin.coupon.list') }}"
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
                                    <div class="mb-4"><label for="form-coupon/name" class="form-label">Code</label>
                                        <input  name="code"  value="{{$coupon->code}}" type="text" class="form-control"
                                            id="form-coupon/name" />
                                            @error('name')
                                               {{$message}}
                                            @enderror
                                    </div>
                                    <div class="mb-4"><label for="form-coupon/discount" class="form-label">Discount</label>
                                        <div class="input-group input-group--sa-discount"><span class="input-group-text"
                                                id="form-coupon/discount-addon">%</span><input
                                                max="100"
                                                min="0"
                                                name="discount"
                                                value="{{$coupon->discount}}"
                                                  type="number" class="form-control"
                                                id="form-coupon/discount"
                                                aria-describedby="form-coupon/discount-addon form-coupon/discount-help" />
                                                @error('discount')
                                                {{$message}}
                                             @enderror
                                        </div>
                                        <div id="form-coupon/discount-help" class="form-text">Unique human-readable
                                            coupon identifier. No longer than 255 characters.</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Status</h2>
                                    </div>
                                    <div class="mb-4"><label class="form-check"><input type="radio"
                                                class="form-check-input" {{ $coupon->is_active == 1 ?  'checked' :  '' }}  name="is_active" value="active" /><span
                                                class="form-check-label">Active</span></label>

                                        <label class="form-check mb-0"><input value="disable" type="radio"
                                            {{ $coupon->is_active == 0 ?  'checked' :  '' }}
                                                class="form-check-input" wire:model.defer="status" name="is_active" /><span
                                                class="form-check-label">Disable</span></label>
                                    </div>

                                </div>
                            </div>
                            <div class="card w-100 mt-5">
                                <div class="card-body p-5">
                                    <div>
                                        <label for="form-product/seo-title" class="form-label">Expire
                                            date</label><input name="expires_at"
                                            value="{{ \Carbon\Carbon::parse($coupon->expires_at)->format('m/d/Y') }}"
                                            type="text"
                                            class="form-control datepicker-here" id="form-product/publish-date"
                                            data-auto-close="true" data-language="en" />
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
