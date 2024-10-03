@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>{{$singleData->last_name}} Order <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/farmer-info')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">{{$singleData->last_name}} Order</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li @if(Request::is('*driver-info*')) class="active" @endif><a href="{{url('admin/driver-info')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
            @if(!empty($singleData->id))
                <li @if(Request::is('*driver-view*')) class="active" @endif><a href="{{url('admin/driver-view/'. $singleData->id)}}"><i class="fa fa-search-plus"></i> <span> View</span></a></li>
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
                                                @if($row->driver_payment_status == 0)
                                                <a href="{{ URL::to('admin/driver-update-payment/'.$row->id)}}" class="btn btn-sm btn-warning"> <i class="fa fa-paper-plane"></i> Pay </a>
                                                @else
                                                <a href="#" class="btn btn-sm btn-success"> <i class="fa fa-check-circle-o"></i> Paid </a>
                                                @endif
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
