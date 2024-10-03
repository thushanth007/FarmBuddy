@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Contact Us Message <small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{url('admin/advertisements')}}"> Contact Us</a></li>
            <li class="active">ID: {{$singleData->id}}</li>
        </ol>
    </section>

    <section class="content contact">
    <div class="nav-tabs-custom">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

        <ul class="nav nav-tabs">
            <li @if(Request::is('*contact')) class="active" @endif><a href="{{url('admin/contact')}}"><i class="fa fa-list"></i> <span>Manage</span></a></li>
            @if($singleData->id)
                <li @if(Request::is('*view')) class="active" @endif><a href="{{url('admin/contact/'.$singleData->id.'/view')}}"><i class="fa fa-search-plus"></i> <span>View</span></a></li>
            @endif
        </ul>

        <div class="tab-content">
            <div class="box-body">
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Read Mail</h3>

                            <div class="box-tools pull-right">
                                <a href="@if(!empty($previous->id)){{url('admin/contact/'.$previous->id.'/view')}}@endif" class="btn btn-box-tool @if(empty($previous->id))disabled @endif" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                                <a href="@if(!empty($next->id)){{url('admin/contact/'.$next->id.'/view')}}@endif" class="btn btn-box-tool @if(empty($next->id))disabled @endif" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="mailbox-read-info">
                                <h3>{{$singleData->subject}}</h3>
                                <h5>From: {{$singleData->email}}
                                    <span class="mailbox-read-time pull-right">{{$singleData->created_at}}</span></h5>
                            </div>
                            <div class="mailbox-read-message">

                                <p class="mb-20">Hello Team,</p>

                                <p class="mb-20">{{$singleData->message}}</p>

                                <p>Thank You,</p>

                                <p>Best Regards, <br>{{$singleData->name}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /. mail -->
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
