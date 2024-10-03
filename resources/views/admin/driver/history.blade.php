@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Order History <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order History</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li @if(Request::is('*driver-history')) class="active" @endif><a href="{{url('admin/driver-history')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
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
                                        <th>Delivery Fee</th>
                                        <th>Order Status</th>
                                        <th>Created</th>
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
                                            <td>Rs.{!! $row->total !!}</td>
                                            <td>Rs.{!! $row->driver_payment !!}</td>
                                            <td>
                                                @if($row->delivered == 1)
                                                <span class="label label-success">Delivered</span>
                                                @else
                                                <span class="label label-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>{!!$row->created_at->format('d - M - Y')!!}</td>
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
