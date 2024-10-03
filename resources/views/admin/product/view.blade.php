@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Product <small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{url('admin/seller-product')}}"> Product</a></li>
            <li class="active">{{$singleData->id}}</li>
        </ol>
    </section>

    <section class="content">
    <div class="nav-tabs-custom">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

        <ul class="nav nav-tabs">
            <li @if(Request::is('*seller-product')) class="active" @endif><a href="{{url('admin/seller-product')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
            @if(empty($singleData->id))
                <li @if(Request::is('*seller-product/add')) class="active" @endif><a href="{{url('admin/seller-product/add')}}"><i class="fa fa-plus"></i> <span> Add</span></a></li>
            @else
                <li @if(Request::is('*seller-product/'. $singleData->id .'/edit')) class="active" @endif><a href="{{url('admin/seller-product/'. $singleData->id .'/edit')}}"><i class="fa fa-edit"></i> <span> Edit</span></a></li>
                <li @if(Request::is('*seller-product/'. $singleData->id .'/view')) class="active" @endif><a href="{{url('admin/seller-product/'. $singleData->id .'/view')}}"><i class="fa fa-search-plus"></i> <span> View</span></a></li>
            @endif
        </ul>

        <div class="tab-content">
            <div class="tab-pane active @if($singleData->status==0) disabledBg @endif">
                <div class="box-header">
                    <h3>
                        {{$singleData->name}}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-view">
                                <tr><th>Category</th> <td>{!! $singleData->category->title?? '-Not Available-' !!}</td> </tr>

                                <tr>
                                    <th width="30%">Status</th>
                                    <td>
                                        @if($singleData->is_status == 1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">Disabled</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr><th>Section</th> <td>{!! $singleData->section?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Unit</th> <td>{!! $singleData->unit?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Price</th> <td>Rs.{!! $singleData->price?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Stock</th> <td>{!! $singleData->stock?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Sold</th> <td>{!! $singleData->sold?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Offer (%)</th> <td>{!! $singleData->offer?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Type</th> <td>{!! $singleData->type?? '-Not Available-' !!}</td> </tr>
                                <tr><th>SKU</th> <td>{!! $singleData->sku?? '-Not Available-' !!}</td> </tr>

                                <tr><th>Information</th> <td>{!! $singleData->information?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Additional Info</th> <td>{!! $singleData->additional_info?? '-Not Available-' !!}</td> </tr>
                                <tr><th>Description</th> <td>{!! $singleData->description?? '-Not Available-' !!}</td> </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-view">
                                <tr>
                                    @if($singleData->image_1)
                                        <td><img src="{{ asset('/storage/product/'.$singleData->image_1) }}" alt="" width="200px"></td>
                                    @endif
                                    @if($singleData->image_2)
                                        <td><img src="{{ asset('/storage/product/'.$singleData->image_2) }}" alt="" width="200px"></td>
                                    @endif
                                </tr>
                                <tr>
                                    @if($singleData->image_3)
                                        <td><img src="{{ asset('/storage/product/'.$singleData->image_3) }}" alt="" width="200px"></td>
                                    @endif
                                    @if($singleData->image_4)
                                        <td><img src="{{ asset('/storage/product/'.$singleData->image_4) }}" alt="" width="200px"></td>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
