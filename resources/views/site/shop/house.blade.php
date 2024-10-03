@extends('site.layout.default')

@section('title') Shop View - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>{{$farmer->farm_name}}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{$farmer->farm_name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="left-box wow fadeInUp">
                        <div class="shop-left-sidebar">
                            <div class="back-button">
                                <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                            </div>

                            <div class="vendor-detail-box">
                                <div class="vendor-name vendor-bottom">
                                    <div class="vendor-logo">
                                        <img src="{{ asset('site/assets/images/vendor-page/logo/3.png') }}" alt="">
                                        <div>
                                            <h3>{{$farmer->farm_name}}</h3>
                                            <div class="product-rating vendor-rating">
                                            <ul class="rating">
                                                @if($averageRatingFarm > 4 || $averageRatingFarm == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($averageRatingFarm > 3 && $averageRatingFarm <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($averageRatingFarm > 2 && $averageRatingFarm <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($averageRatingFarm > 1 && $averageRatingFarm <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($averageRatingFarm > 0 && $averageRatingFarm <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($averageRatingFarm, 1)}} of 5)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Our products are harvested at peak ripeness, ensuring maximum flavor and nutrition. You’ll taste the difference with every bite!</p>
                                </div>

                                <div class="vendor-tag vendor-bottom">
                                    <h4>Perfect for you, if you like</h4>
                                    <ul>
                                        <li>Vegetable</li>
                                        <li>Fruit</li>
                                        <li>Meat</li>
                                        <li>Backery</li>
                                        <li>Organic</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <div class="right-box">
                        <div class="show-button">
                            <div class="filter-button-group mt-0">
                                <div class="filter-button d-inline-block d-lg-none">
                                    <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                                </div>
                            </div>

                            <div class="top-filter-menu">
                                <div class="category-dropdown">
                                    <h5 class="text-content">Sort By :</h5>
                                    <div class="dropdown">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown">
                                            <span>Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" id="aToz" href="javascript:void(0)">Most Popular</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="grid-option">
                                    <ul>
                                        <li class="three-grid d-xxl-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-3.svg" class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li class="grid-btn active">
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid-4.svg"
                                                    class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/grid.svg"
                                                    class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                                            </a>
                                        </li>
                                        <li class="list-btn">
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/list.svg" class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                            @foreach ($related as $re)
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{url('/product/' . $re->id . '/view')}}">
                                                <img src="{{ asset('/storage/product/'.$re->image_1) }}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <a href="{{url('/product/' . $re->id . '/view')}}">
                                                <h5 class="name">{{$re->name}}</h5>
                                            </a>
                                            <div class="product-rating mt-2">
                                            <ul class="rating">
                                                @if($re->review_avg_rating > 4 || $re->review_avg_rating == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($re->review_avg_rating > 3 && $re->review_avg_rating <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($re->review_avg_rating > 2 && $re->review_avg_rating <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($re->review_avg_rating > 1 && $re->review_avg_rating <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($re->review_avg_rating > 0 && $re->review_avg_rating <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($re->review_avg_rating, 0)}})</span>
                                            </div>
                                            <h6 class="unit">{{$re->unit}}</h6>
                                            <h5 class="price">
                                                <span class="theme-color">@if($re->offer) Rs.{{number_format($re->price - ($re->price * ($re->offer/100)), 0)}} @else Rs.{{number_format($re->price, 0)}} @endif</span>
                                                @if($re->offer)<del class="text-content">Rs.{{number_format($re->price, 0)}}</del>@endif
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
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
                        </div>

                        @if(count($related) == 0)
                            <div class="pt-5">
                                <div class="product-box-3 txt-align-center">
                                    <h5 class="name">No data available at this time.</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
