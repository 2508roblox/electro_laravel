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
                                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">Orders</h1>
                    </div>
                    <div class="col-auto d-flex"><a href="app-order.html" class="btn btn-primary">New
                            order</a></div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Start typing to search for orders"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <table class="sa-datatables-init text-nowrap" data-order="[[ 1, &quot;desc&quot; ]]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="w-min" data-orderable="false"><input type="checkbox"
                                    class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." /></th>
                            <th>Number</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orderData as $item)
                        <tr>
                            <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                    aria-label="..." /></td>
                            <td><a href="app-order.html" class="text-reset">#00{{$item['ID']}}</a></td>
                            <td>{{$item['Date']}}</td>
                            <td><a href="app-customer.html" class="text-reset">@php
                                echo ucwords($item['Name']);
                            @endphp</a></td>
                            <td>
                                <div class="d-flex fs-6">
                                    <div class="badge badge-sa-success">Yes</div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex fs-6">

                                    @if ($item['Status'] =='pending')
                                    <div class="badge badge-sa-warning">{{$item['Status']}}</div>



                                    @elseif ($item['Status'] =='confirm' || $item['Status'] =='paid')

                                    <div class="badge badge-sa-success">{{$item['Status']}}</div>


                                    @else
                                    <div class="badge badge-sa-danger">{{$item['Status']}}</div>


                                    @endif
                                </div>
                            </td>
                            <td>{{$item['Total Quantity']}} items</td>
                            <td>
                                <div class="sa-price"><span class="sa-price__symbol"></span><span
                                        class="sa-price__integer"> ${{ number_format($item['Total Price']) }}</span><span
                                        class="sa-price__decimal"></span></div>


                            </td>
                            <td class="d-flex gap-2">
                              <form action="{{route('admin.order.show', ['id' => $item['ID']])}}" >
                                @csrf
                                <input type="submit" value="Detail"  class="btn btn-primary btn   btn-sm" type="button"

                                      >




                              </form>
                              <form action="{{route('admin.order.cancel' )}} " method="POST" >

                                @csrf
                                @method('PUT')
                                <input type="text" hidden name="status" value="cancel">
                                <input type="text" hidden name="id" value="{{$item['ID']}}">
                                @if ($item['Status'] == 'confirm')
                                <input type="submit" disabled value="Cancel"  class="btn btn-muted opacity-25     btn-sm" type="button"

                                >
                                @else
                                <input type="submit" value="Cancel"  class="btn btn-danger btn   btn-sm" type="button"

                                >

                                @endif





                              </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



        @endsection
