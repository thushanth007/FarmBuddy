@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Order <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li @if(Request::is('*seller-order')) class="active" @endif><a href="{{url('admin/seller-order')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
            @if(!empty($singleData->id))
                <li @if(Request::is('*seller-order/'. $singleData->id .'/view')) class="active" @endif><a href="{{url('admin/seller-order/'. $singleData->id .'/view')}}"><i class="fa fa-search-plus"></i> <span> View</span></a></li>
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
                                        <th>Customer</th>
                                        <th>Reference</th>
                                        <th>Delivery</th>
                                        <th>Payment</th>
                                        <th>Total</th>
                                        <th>Order Conformation</th>
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
                                            <td>{!! $row->userName->name !!}</td>
                                            <td>{!! $row->order_reference !!}</td>
                                            <td>{!! $row->delivery_option !!}</td>
                                            <td>{!! $row->payment_option !!}</td>
                                            <td>{!! $row->total !!}</td>
                                            <td>
                                                @if($row->delivered == 1)
                                                <span class="label label-success">Delivered</span>
                                                @elseif($row->driver_picked_up == 1)
                                                <span class="label label-warning">Driver Picked Up</span>
                                                @elseif($row->order_confirmed == 1)
                                                <span class="label label-warning">Order Confirmed</span>
                                                @elseif($row->order_placed == 1)
                                                <span class="label label-warning">Order Placed</span>
                                                @endif
                                            </td>
                                            <td>{!!$row->created_at->format('d - M - Y')!!}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/seller-order/'.$row->id.'/view')}}" class="btn btn-sm btn-success"> <i class="fa fa-search-plus"></i> </a>
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
