@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Category <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li @if(Request::is('*seller-category*')) class="active" @endif><a href="{{url('admin/seller-category')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="row">
                    <div class="col-md-10">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Icon</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $count = 0; ?>
                                        @foreach ($categories as $row)
                                        <?php $count++; ?>
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{!! $row->title !!}</td>
                                            <td>
                                                <img src="{{ $row->icon }}" alt="" width="35px" height="35px">
                                            </td>
                                            <td>
                                                @if($row->status == 1)
                                                <span class="label label-success">Active</span>
                                                @else
                                                <span class="label label-danger">Disabled</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
