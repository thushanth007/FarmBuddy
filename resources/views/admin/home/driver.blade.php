@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Driver Info <small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Driver Info</li>
        </ol>
    </section>

    <section class="content contact-view">
        <div class="nav-tabs-custom">
            @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
            @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

            <ul class="nav nav-tabs">
                <li @if(Request::is('*driver-info')) class="active" @endif><a href="{{url('admin/driver-info')}}"><i class="fa fa-list"></i> <span>Manage</span></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Bank Name</th>
                                        <th>Account No</th>
                                        <th>Payment</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    @foreach ($driver as $row)
                                    <?php $count++; ?>
                                    <tr class="@if($row->view == 0) enabledBg @endif">
                                        <td>{{$count}}</td>
                                        <td>{!! $row->first_name !!} {!! $row->last_name !!}</td>
                                        <td>{!! $row->email !!}</td>
                                        <td>{!! $row->phone !!}</td>
                                        <td>{!! $row->bank_name !!}</td>
                                        <td>{!! $row->bank_account_number !!}</td>
                                        <td>Rs.{!! $row->driver_payment ?? 0 !!}</td>
                                        <td>{!!$row->created_at->format('d M, Y')!!}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/driver-view/'.$row->id)}}" class="btn btn-sm btn-success"> <i class="fa fa-search-plus"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!!$driver->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
@endsection
