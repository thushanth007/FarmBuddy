@extends('site.layout.default')

@section('title') Dashboard - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/user/dashboard')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">User Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                @if($location->latitude == '') <div class="alert alert-warning"> Please update the current location in the address tab.</div> @endif
                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="{{ asset('site/assets/images/inner-page/cover-img.jpg') }}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="{{ asset('site/assets/images/inner-page/user/profile.jpg') }}"
                                            class="blur-up lazyload update_img" alt="">
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{$basic->first_name}} {{$basic->last_name}}</h3>
                                    <h6 class="text-content">{{$basic->email}}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-dashboard" type="button"><i data-feather="home"></i>
                                    DashBoard</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-order" type="button"><i
                                        data-feather="shopping-bag"></i>Order</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"><i
                                        data-feather="shield"></i> History</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-wishlist-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-wishlist" type="button"><i data-feather="heart"></i>
                                    Wishlist</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-address" type="button" role="tab"><i
                                        data-feather="map-pin"></i>Address</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"><i data-feather="user"></i>
                                    Profile</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b class="text-title">{{$basic->first_name}} {{$basic->last_name}}</b></h6>
                                        <p class="text-content">Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="total-detail">
                                                        <h5>Total Order</h5>
                                                        <h3>{{$total_order}}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="total-detail">
                                                        <h5>Total Pending Order</h5>
                                                        <h3>{{$total_pending_order}}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="total-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="total-detail">
                                                        <h5>Total Wishlist</h5>
                                                        <h3>{{$total_wish_list}}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-title">
                                        <h3>Account Information</h3>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="dashboard-content-title">
                                                <h4>Contact Information <a href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editProfile">Edit</a>
                                                </h4>
                                            </div>
                                            <div class="dashboard-detail">
                                                <h6 class="text-content">{{$basic->first_name}} {{$basic->last_name}}</h6>
                                                <h6 class="text-content">{{$basic->email}}</h6>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="dashboard-content-title">
                                                <h4>Address Book <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a></h4>
                                            </div>

                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="dashboard-detail">
                                                        <h6 class="text-content">Default Billing Address</h6>
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#editProfile">Edit Address</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-order" role="tabpanel">
                                <div class="dashboard-privacy">
                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Order Tracking</h3>
                                        </div>

                                        @foreach ($orderProducts as $status)
                                        <section class="order-detail">
                                            <div class="row g-sm-4 g-3">
                                                <h3>Tracking Code : <label class="theme-color">{{$status->order_reference}}</label></h3>
                                                <div class="col-12 overflow-hidden">
                                                    <ol class="progtrckr">
                                                        <li class="progtrckr-done">
                                                            <h5>Order Placed</h5>
                                                            <h6>Completed</h6>
                                                        </li>

                                                        @if($status->order_confirmed == 0 && $status->delivered == 0)
                                                            <li class="progtrckr-todo">
                                                                <h5>Order Confirmed</h5>
                                                                <h6>
                                                                    Processing
                                                                </h6>
                                                            </li>
                                                        @else
                                                            <li class="progtrckr-done">
                                                                <h5>Order Confirmed</h5>
                                                                <h6>
                                                                    Completed
                                                                </h6>
                                                            </li>
                                                        @endif

                                                        @if($status->order_confirmed == 0 && $status->driver_picked_up == 0 && $status->delivered == 0)
                                                            <li class="progtrckr-todo">
                                                                <h5>Driver Picked Up</h5>
                                                                <h6>
                                                                    Pending
                                                                </h6>
                                                            </li>
                                                        @elseif($status->order_confirmed == 1 && $status->driver_picked_up == 0 && $status->delivered == 0)
                                                            <li class="progtrckr-todo">
                                                                <h5>Driver Picked Up</h5>
                                                                <h6>
                                                                    Processing
                                                                </h6>
                                                            </li>
                                                        @else
                                                            <li class="progtrckr-done">
                                                                <h5>Driver Picked Up</h5>
                                                                <h6>
                                                                    Completed
                                                                </h6>
                                                            </li>
                                                        @endif

                                                        @if($status->delivered == 0)
                                                            <li class="progtrckr-todo">
                                                                <h5>Delivered</h5>
                                                                <h6>
                                                                    Pending
                                                                </h6>
                                                            </li>
                                                            @else
                                                            <li class="progtrckr-done">
                                                                <h5>Delivered</h5>
                                                                <h6>
                                                                    Completed
                                                                </h6>
                                                            </li>
                                                            @endif
                                                    </ol>
                                                </div>
                                            </div>
                                        </section>
                                        @endforeach
                                        @if(count($orderProducts) == 0)
                                            <div class="product-box-3 txt-align-center">
                                                <h5 class="name">No data available at this time.</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-wishlist" role="tabpanel">
                                <div class="dashboard-wishlist">
                                    <div class="title">
                                        <h2>My Wishlist History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="row g-sm-4 g-3">
                                        @foreach ($wishlist as $re)
                                        <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                            <div class="product-box-3 theme-bg-white h-100">
                                                <div class="product-header">
                                                    <div class="product-image">
                                                        <a href="{{url('/product/' . $re->id . '/view')}}">
                                                            <img src="{{ asset('/storage/product/'.$re->attributes->get('image')) }}"
                                                                class="img-fluid blur-up lazyload" alt="">
                                                        </a>

                                                        <div class="product-header-top">
                                                            <button class="btn wishlist-button close_button" onclick="window.location.href='{{url('wishlist/remove/' . $re->id)}}'">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product-footer">
                                                    <div class="product-detail">
                                                        <a href="{{url('/product/' . $re->id . '/view')}}">
                                                            <h5 class="name">{{$re->name}}</h5>
                                                        </a>
                                                        <h6 class="unit mt-1">{{$re->attributes->get('unit')}}</h6>
                                                        <h5 class="price">
                                                        <span class="theme-color">@if($re->attributes->get('offer')) Rs.{{$re->price - ($re->price * ($re->attributes->get('offer')/100))}} @else Rs.{{$re->price}} @endif</span>
                                                        @if($re->attributes->get('offer'))<del>Rs.{{$re->price}}</del>@endif
                                                        </h5>
                                                        <div class="add-to-cart-box mt-2">
                                                            <button class="btn btn-add-cart addcart-button" tabindex="0" onclick="window.location.href='{{url('/product/' . $re->id . '/view')}}'">Add
                                                                <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if(count($wishlist) == 0)
                                            <div class="product-box-3 txt-align-center">
                                                <h5 class="name">No data available at this time.</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-security" role="tabpanel">
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>My Orders History</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-contain">
                                        @foreach ($orderProducts as $op)
                                        <div class="order-box dashboard-bg-box">
                                            <div class="order-container">
                                                <div class="order-icon">
                                                    <i data-feather="box"></i>
                                                </div>

                                                <div class="order-detail">
                                                    <h4>
                                                        @if($op->delivered == 0) Delivers <span>Pending</span> @else Delivered <span class="success-bg">Success</span> @endif
                                                    </h4>
                                                </div>
                                            </div>

                                            <div class="product-order-detail">
                                                <a href="{{url('/product/' . $op->id . '/view')}}" class="order-image">
                                                    <img src="{{ asset('/storage/product/'.$op->image_1) }}"
                                                        class="blur-up lazyload" alt="">
                                                </a>

                                                <div class="order-wrap">
                                                    <a href="{{url('/product/' . $op->id . '/view')}}">
                                                        <h3>{{$op->name}}</h3>
                                                    </a>
                                                    <p class="text-content">{{$op->information}}</p>
                                                    <ul class="product-size">
                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Price : </h6>
                                                                <h5>@if($op->offer) Rs.{{$op->price - ($op->price * (($op->offer)/100))}} @else Rs.{{$op->price}} @endif</h5>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Rate : </h6>
                                                                <div class="product-rating ms-2">
                                                                    <ul class="rating">
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star" class="fill"></i>
                                                                        </li>
                                                                        <li>
                                                                            <i data-feather="star"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="size-box">
                                                                <h6 class="text-content">Unit : </h6>
                                                                <h5>{{$op->unit}}</h5>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @if(count($orderProducts) == 0)
                                            <div class="product-box-3 txt-align-center">
                                                <h5 class="name">No data available at this time.</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-address" role="tabpanel">
                                <div class="dashboard-address">
                                    <div class="title title-flex">
                                        <div>
                                            <h2>My Address Book</h2>
                                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row g-sm-4 g-3">
                                        <div class="col-8">
                                            <div class="address-box">
                                                <div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="jack"
                                                            id="flexRadioDefault2" checked>
                                                    </div>

                                                    <div class="label">
                                                        <label>Home</label>
                                                    </div>

                                                    <div class="table-responsive address-table">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2">{{$basic->name}}</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Address :</td>
                                                                    <td>
                                                                        <p>
                                                                            {{$basic->street}}, {{$basic->city}}, {{$basic->postal_code}}
                                                                        </p>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone Code :</td>
                                                                    <td>+94</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Phone :</td>
                                                                    <td>{{$basic->phone}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="button-group">
                                                    <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile"><i data-feather="edit"></i>
                                                        Edit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <body onload="initMap()">
                                                <h4>Click on the map to get latitude and longitude:</h4>
                                                <div id="map" style="width: 65%; height: 200px;"></div>
                                                <form method="POST" action="/user-location">
                                                    @csrf
                                                    <input type="text" id="lat" name="latitude" placeholder="Latitude">
                                                    <input type="text" id="lng" name="longitude" placeholder="Longitude">
                                                    <button type="submit">Submit</button>
                                                </form>
                                            </body>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-detail dashboard-bg-box">
                                        <div class="dashboard-title">
                                            <h3>Profile Name</h3>
                                        </div>
                                        <div class="profile-name-detail">
                                            <div class="d-sm-flex align-items-center d-block">
                                                <h3>{{$basic->first_name}} {{$basic->last_name}}</h3>
                                            </div>

                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#editProfile">Edit</a>
                                        </div>

                                        <div class="location-profile">
                                            <ul>
                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="map-pin"></i>
                                                        <h6>{{$basic->street}}, {{$basic->city}}, {{$basic->postal_code}}</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="mail"></i>
                                                        <h6>{{$basic->email}}</h6>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="location-box">
                                                        <i data-feather="check-square"></i>
                                                        <h6>Licensed for 5 years</h6>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="profile-about dashboard-bg-box">
                                        <div class="row">
                                            <div class="col-xxl-7">
                                                <div class="dashboard-title mb-3">
                                                    <h3>Profile About</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Phone Number :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)"> {{$basic->phone}}</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address :</td>
                                                                <td>{{$basic->street}}, {{$basic->city}}, {{$basic->postal_code}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="dashboard-title mb-3">
                                                    <h3>Login Details</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Email :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">{{$basic->email}}
                                                                        <span data-bs-toggle="modal"
                                                                            data-bs-target="#editProfile">Edit</span></a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password :</td>
                                                                <td>
                                                                    <a href="javascript:void(0)">●●●●●●</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-xxl-5">
                                                <div class="profile-image">
                                                    <img src="{{ asset('site/assets/images/inner-page/dashboard-profile.png') }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
@endsection

@section('model')
        <!-- Edit Profile Start -->
        <div class="modal fade theme-modal" id="editProfile" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">

            <form class="row g-4" id="UpdateForm" method="post" action="{{url('/user/update')}}">
            {!! Form::model($basic, array('files' => true, 'url' => '/user/update', 'autocomplete' => 'off')) !!}
            {!!csrf_field()!!}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                                <label for="fullname">First Name *</label>
                                <em class="error-msg">{!!$errors->first('first_name')!!}</em>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                                <label for="fullname">Last Name *</label>
                                <em class="error-msg">{!!$errors->first('last_name')!!}</em>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                <label for="email">Email Address *</label>
                                <em class="error-msg">{!!$errors->first('email')!!}</em>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                                <label for="fullname">Phone Number *</label>
                                <em class="error-msg">{!!$errors->first('phone')!!}</em>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('street', null, ['class' => 'form-control']) !!}
                                <label for="fullname">Street *</label>
                                <em class="error-msg">{!!$errors->first('street')!!}</em>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                                <label for="fullname">City *</label>
                                <em class="error-msg">{!!$errors->first('city')!!}</em>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating theme-form-floating">
                                {!! Form::text('postal_code', null, ['class' => 'form-control']) !!}
                                <label for="fullname">Postal Code *</label>
                                <em class="error-msg">{!!$errors->first('postal_code')!!}</em>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" data-bs-dismiss="modal"
                        class="btn theme-bg-color btn-md fw-bold text-light">Save changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Edit Profile End -->
@endsection

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 8.78755734015209, lng: 80.48483021834353},
                zoom: 12
            });

            google.maps.event.addListener(map, 'click', function(event) {
                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                
                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
            });
        }
    </script>
@endsection
