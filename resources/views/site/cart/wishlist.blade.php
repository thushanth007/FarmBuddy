@extends('site.layout.default')

@section('title') Wish List - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Wishlist</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Wishlist</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @foreach ($wishlist as $re)
                <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                    <div class="product-box-3 h-100">
                        <div class="product-header">
                            <div class="product-image">
                                <a href="{{url('/product/' . $re->id . '/view')}}">
                                    <img src="{{ asset('/storage/product/'.$re->attributes->get('image')) }}" class="img-fluid blur-up lazyload" alt="">
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

                                <div class="add-to-cart-box bg-white mt-2">
                                    <button class="btn btn-add-cart addcart-button" onclick="window.location.href='{{url('/product/' . $re->id . '/view')}}'">Add
                                        <span class="add-icon bg-light-gray">
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
                <div class="col-12">
                    <div class="product-box-3 txt-align-center">
                        <h5 class="name">No data available at this time.</h5>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection
