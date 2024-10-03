@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Review <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/seller-dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Review</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li @if(Request::is('*sseller-review')) class="active" @endif><a href="{{url('admin/seller-review')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
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
                                        <th>Product Name</th>
                                        <th>Rating</th>
                                        <th>Review</th>
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
                                            <td>{!! $row->product->name !!}</td>
                                            <td>{!! $row->rating !!}</td>
                                            <td>{!! $row->review !!}</td>
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
