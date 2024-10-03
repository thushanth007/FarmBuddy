@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Driver Delivery Request <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Driver Delivery Request</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
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
                                        <th>Reference</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Created</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $count = 0; ?>
                                        @foreach ($data as $row)
                                        <?php $count++; ?>
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{!! $row->order->order_reference !!}</td>
                                            <td>{!! $row->product->name !!}</td>
                                            <td>{!! $row->quantity !!}</td>
                                            <td>{!!$row->created_at->format('d - M - Y')!!}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="box-header">
                                        <h3>
                                            Farmer Details
                                        </h3>
                                    </div>
                                    <table class="table table-bordered table-view">
                                        <tr><th>Name</th> <td>{!! $farmer->first_name?? '-Not Available-' !!} {!! $farmer->last_name?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Phone</th> <td>{!! $farmer->phone?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Email</th> <td>{!! $farmer->email?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Address</th> <td>{!! $farmer->street?? '-Not Available-' !!}, {!! $farmer->city?? '-Not Available-' !!}, {!! $farmer->postal_code?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Order Status</th>
                                            <td>
                                                @if($singleData->order_confirmed == 1)
                                                <span class="label label-success">Confirmed</span>
                                                @else
                                                <span class="label label-warning">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-header">
                                        <h3>
                                            Customer Details
                                        </h3>
                                    </div>
                                    <table class="table table-bordered table-view">
                                        <tr><th>Name</th> <td>{!! $user->first_name?? '-Not Available-' !!} {!! $user->last_name?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Phone</th> <td>{!! $user->phone?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Email</th> <td>{!! $user->email?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Address</th> <td>{!! $user->street?? '-Not Available-' !!}, {!! $user->city?? '-Not Available-' !!}, {!! $user->postal_code?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Payment Option</th> <td>{!! $singleData->payment_option?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Total</th> <td>Rs.{!! $singleData->total?? '-Not Available-' !!}</td> </tr>
                                        <tr><th>Driver Payment</th> <td>Rs.{!! $singleData->driver_payment?? '-Not Available-' !!}</td> </tr>
                                    </table>
                                </div>
                            </div>

                            @if($request->is_status == 0 && $verification == 0)
                                <div class="pull-right form-group">
                                    @php $url = 'admin/driver-accept/' . $request->driver_reference @endphp
                                    {!! Form::model($singleData, ['files' => true, 'url' => $url, 'autocomplete' => 'off']) !!}
                                    {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check-circle-o"></i> Accept Delivery
                                        </button>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
