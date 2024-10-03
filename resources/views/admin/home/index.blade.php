@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Dashboard <small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{$order}}</h3>
                        <h1>Orders</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cart-arrow-down"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{$users}}</h3>
                        <h1>Consumers</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-yellow-active">
                    <div class="inner">
                        <h3>{{$farmer}}</h3>
                        <h1>Farmers</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-secret"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>{{$driver}}</h3>
                        <h1>Drivers</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-circle"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$category}}</h3>
                        <h1>Category</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-list-ul"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-teal-active">
                    <div class="inner">
                        <h3>{{$products}}</h3>
                        <h1>Products</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cubes"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-fuchsia-active">
                    <div class="inner">
                        <h3>{{ $review }}</h3>
                        <h1>Review</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-star-half-o"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="small-box bg-olive-active">
                    <div class="inner">
                        <h3>{{ $contact }}</h3>
                        <h1>Message</h1>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
