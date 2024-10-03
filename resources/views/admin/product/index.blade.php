@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Product <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li @if(Request::is('*seller-product')) class="active" @endif><a href="{{url('admin/seller-product')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
            @if(empty($singleData->id))
                <li @if(Request::is('*seller-product/add')) class="active" @endif><a href="{{url('admin/seller-product/add')}}"><i class="fa fa-plus"></i> <span> Add</span></a></li>
            @else
                <li @if(Request::is('*seller-product/'. $singleData->id .'/edit')) class="active" @endif><a href="{{url('admin/seller-product/'. $singleData->id .'/edit')}}"><i class="fa fa-pensil"></i> <span> Edit</span></a></li>
                <li @if(Request::is('*seller-product/'. $singleData->id .'/view')) class="active" @endif><a href="{{url('admin/seller-product/'. $singleData->id .'/view')}}"><i class="fa fa-search-plus"></i> <span> View</span></a></li>
            @endif
        </ul>

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Section</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Sold</th>
                                        <th>Offer (%)</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $count = 0; ?>
                                        @foreach ($data as $row)
                                        <?php $count++; ?>
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{!! $row->name !!}</td>
                                            <td>{!! $row->section !!}</td>
                                            <td>{!! $row->unit !!}</td>
                                            <td>{!! $row->price !!}</td>
                                            <td>{!! $row->stock !!}</td>
                                            <td>{!! $row->sold ? $row->sold : '-' !!}</td>
                                            <td>{!! $row->offer ? $row->offer : '-' !!}</td>
                                            <td>
                                                <img src="{{ asset('/storage/product/'.$row->image_1) }}" alt="" width="40px" height="40px">
                                            </td>
                                            <td>
                                                @if($row->is_status == 1)
                                                <span class="label label-success">Active</span>
                                                @else
                                                <span class="label label-danger">Disabled</span>
                                                @endif
                                            </td>
                                            <td>{!!$row->created_at->format('d - M - Y')!!}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/seller-product/'.$row->id.'/view')}}" class="btn btn-sm btn-success"> <i class="fa fa-search-plus"></i> </a>
                                                <a href="{{ URL::to('admin/seller-product/'.$row->id.'/edit')}}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ URL::to('admin/seller-product/'.$row->id.'/delete')}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    {!!$data->links()!!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
