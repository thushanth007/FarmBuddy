@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Order View <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Order View</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if (count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

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
                            @if($singleData->order_confirmed == 0)
                                <div class="pull-right form-group">
                                    @php $url = 'admin/seller-order/' . $singleData->id . '/confirm' @endphp
                                    {!! Form::model($singleData, ['files' => true, 'url' => $url, 'autocomplete' => 'off']) !!}
                                    {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check-circle-o"></i> Order Confirmed
                                        </button>
                                    {!! Form::close() !!}
                                </div>
                            @endif
                            @if($singleData->delivery_option == 'Click and Collect' && $singleData->order_confirmed == 1 && $singleData->delivered == 0)
                                <div class="pull-right form-group">
                                    @php $url = 'admin/seller-order/' . $singleData->id . '/delivered' @endphp
                                    {!! Form::model($singleData, ['files' => true, 'url' => $url, 'autocomplete' => 'off']) !!}
                                    {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-check-circle-o"></i> Order Delivered
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
