@extends('site.layout.default')

@section('title') Product View - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>{{$product->name}}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">{{$product->name}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Left Sidebar Start -->
    <section class="product-section">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                    <div class="row g-4">
                        <div class="col-xl-6 wow fadeInUp">
                            <div class="product-left-box">
                                <div class="row g-2">
                                    <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                        <div class="product-main-2 no-arrow">
                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{ asset('/storage/product/'.$product->image_2) }}"
                                                        data-zoom-image="{{ asset('/storage/product/'.$product->image_2) }}"
                                                        class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{ asset('/storage/product/'.$product->image_3) }}"
                                                        data-zoom-image="{{ asset('/storage/product/'.$product->image_3) }}"
                                                        class="img-fluid image_zoom_cls-2 blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="slider-image">
                                                    <img src="{{ asset('/storage/product/'.$product->image_4) }}"
                                                        data-zoom-image="{{ asset('/storage/product/'.$product->image_4) }}"
                                                        class="img-fluid image_zoom_cls-3 blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                        <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="{{ asset('/storage/product/'.$product->image_2) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="{{ asset('/storage/product/'.$product->image_3) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>

                                            <div>
                                                <div class="sidebar-image">
                                                    <img src="{{ asset('/storage/product/'.$product->image_4) }}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="right-box-contain">
                                @if($product->offer)<h6 class="offer-top">{{number_format($product->offer, 0)}}% Off</h6>@endif
                                <h2 class="name">{{$product->name}}</h2>
                                <div class="price-rating">
                                    <h3 class="theme-color price">
                                        @if($product->offer) Rs.{{number_format($product->price - ($product->price * ($product->offer/100)), 0)}} @else Rs.{{number_format($product->price, 0)}} @endif
                                        @if($product->offer)<del class="text-content">Rs.{{number_format($product->price, 0)}}</del>@endif
                                        @if($product->offer)<span class="offer theme-color">({{number_format($product->offer, 0)}}% off)</span>@endif
                                    </h3>
                                    <div class="product-rating custom-rate">
                                        <ul class="rating">
                                            @if($averageRating > 4 || $averageRating == 0)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            @elseif($averageRating > 3 && $averageRating <= 4)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            @elseif($averageRating > 2 && $averageRating <= 3)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @elseif($averageRating > 1 && $averageRating <= 2)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @elseif($averageRating > 0 && $averageRating <= 1)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @endif
                                        </ul>
                                        <span class="review">{{$total}} Customer Review</span>
                                    </div>
                                </div>

                                <div class="product-contain">
                                    <p>{{$product->information}}</p>
                                </div>

                                <div class="product-package">
                                    <div class="product-title">
                                        <h4>{{$product->unit}}</h4>
                                    </div>
                                </div>

                                @php $url = 'cart/add/'.$product->id @endphp
                                {!! Form::model(null, array('files' => true, 'url' => $url, 'autocomplete' => 'off')) !!}
                                {!!csrf_field()!!}
                                <div class="note-box product-package">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-left-minus btn-minus" data-type="minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text" name="qty" value="1" min="1">
                                            <button type="button" class="qty-right-plus btn-plus" data-type="plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if($product->stock > 0)
                                        <button type="submit" class="btn btn-md bg-dark cart-button text-white w-100">Add To Cart</button>
                                    @else
                                        <button type="button" class="btn btn-md bg-dark cart-button text-white w-100" disabled>Out of Stock</button>
                                    @endif
                                </div>
                                <em class="error-msg">{!!$errors->first('qty')!!}</em>
                                {!! Form::close() !!}

                                <div class="buy-box">
                                    <a href="{{ url('wishlist/add/' . $product->id) }}">
                                        <i data-feather="heart"></i>
                                        <span>Add To Wishlist</span>
                                    </a>
                                </div>

                                <div class="pickup-box">
                                    <div class="product-info">
                                        <ul class="product-info-list product-info-list-2">
                                            <li>Type : <a href="javascript:void(0)">{{$product->type}}</a></li>
                                            <li>SKU : <a href="javascript:void(0)">{{$product->sku}}</a></li>
                                            <li>Stock : <a href="javascript:void(0)">{{$product->stock}} Items Left</a></li>
                                            <li>Tags : <a href="javascript:void(0)">{{$product->category->title}}</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="payment-option">
                                    <div class="product-title">
                                        <h4>Guaranteed Safe Checkout</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/1.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/2.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/3.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/4.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="https://themes.pixelstrap.com/fastkart/assets/images/product/payment/5.svg"
                                                    class="blur-up lazyload" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="product-section-box">
                                <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" type="button" role="tab">Description</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab">Additional info</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab">Review</button>
                                    </li>
                                </ul>

                                <div class="tab-content custom-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                <p>{{$product->description}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="info" role="tabpanel">
                                        <div class="product-description">
                                            <div class="nav-desh">
                                                <p>{{$product->additional_info}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review" role="tabpanel">
                                        <div class="review-box">
                                            <div class="row">
                                                <div class="col-xl-5">
                                                    <div class="product-rating-box">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="product-main-rating">
                                                                    <h2>{{$averageRating}}
                                                                        <i data-feather="star"></i>
                                                                    </h2>

                                                                    <h5>5 Overall Rating</h5>
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12">
                                                                <ul class="product-rating-list">
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>5<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: @if($rating1){{$rating1/$total*100}} @else 0 @endif %;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">{{$rating5}}</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>4<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: @if($rating1){{$rating2/$total*100}} @else 0 @endif %;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">{{$rating4}}</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>3<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: @if($rating1){{$rating3/$total*100}} @else 0 @endif %;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">{{$rating3}}</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>2<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: @if($rating1){{$rating4/$total*100}} @else 0 @endif %;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">{{$rating2}}</h5>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="rating-product">
                                                                            <h5>1<i data-feather="star"></i></h5>
                                                                            <div class="progress">
                                                                                <div class="progress-bar"
                                                                                    style="width: @if($rating1){{$rating5/$total*100}} @else 0 @endif %;">
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="total">{{$rating1}}</h5>
                                                                        </div>
                                                                    </li>

                                                                </ul>

                                                                <div class="review-title-2">
                                                                    <h4 class="fw-bold">Review this product</h4>
                                                                    <p>Let other customers know what you think</p>
                                                                    <button class="btn" type="button"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#writereview">Write a
                                                                        review</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-7">
                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            @foreach ($review as $re)
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image people-text">
                                                                            <img alt="user" class="img-fluid "
                                                                                src="{{ asset('site/assets/images/review/1.jpg') }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="people-comment">
                                                                        <div class="people-name"><a
                                                                                href="javascript:void(0)"
                                                                                class="name">{{$re->userName->name}}</a>
                                                                            <div class="date-time">
                                                                                <h6 class="text-content"> {!!$re->created_at->format('d - M - Y')!!} </h6>
                                                                                <div class="product-rating">
                                                                                    <ul class="rating">
                                                                                        @if($re->rating > 4 || $re->rating == 0)
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        @elseif($re->rating > 3 && $re->rating <= 4)
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        @elseif($re->rating > 2 && $re->rating <= 3)
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        @elseif($re->rating > 1 && $re->rating <= 2)
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        @elseif($re->rating > 0 && $re->rating <= 1)
                                                                                        <li><i data-feather="star" class="fill"></i></li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        <li><i data-feather="star"></i> </li>
                                                                                        @endif
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <p>{{$re->review}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
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

                <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                    <div class="right-sidebar-box">
                        <div class="vendor-box">
                            <div class="vendor-contain">
                                <div class="vendor-image">
                                    <img src="{{ asset('site/assets/images/vendor-page/logo/3.png') }}" class="blur-up lazyload" alt="">
                                </div>

                                <div class="vendor-name">
                                    <h5 class="fw-500">{{$farm->farm_name}}</h5>

                                    <div class="product-rating mt-1">
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
                                            @elseif($averageRatingFarm > 0 && $averageRatingFarm < 1)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @endif
                                        </ul>
                                        <span>({{$countRatingFarm}} Reviews)</span>
                                    </div>

                                </div>
                            </div>

                            <p class="vendor-detail">Our products are harvested at peak ripeness, ensuring maximum flavor and nutrition. You’ll taste the difference with every bite!</p>

                            <div class="vendor-list">
                                <ul>
                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="map-pin"></i>
                                            <h5>Address: <span class="text-content">{{$farm->street}}, {{$farm->city}}, {{$farm->postal_code}}</span></h5>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="address-contact">
                                            <i data-feather="headphones"></i>
                                            <h5>Contact Seller: <span class="text-content">{{$farm->phone}}</span></h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Trending Product -->
                        <div class="pt-25">
                            <div class="category-menu">
                                <h3>Trending Products</h3>

                                <ul class="product-list product-right-sidebar border-0 p-0">
                                    @foreach ($trending as $tr)
                                    <li>
                                        <div class="offer-product">
                                            <a href="{{url('/product/' . $tr->id . '/view')}}" class="offer-image">
                                                <img src="{{ asset('/storage/product/'.$tr->image_1) }}" class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="{{url('/product/' . $tr->id . '/view')}}">
                                                        <h6 class="name">{{$tr->name}}</h6>
                                                    </a>
                                                    <span>{{$tr->unit}}</span>
                                                    <h6 class="price theme-color">
                                                        @if($tr->offer) Rs.{{number_format($tr->price - ($tr->price * ($tr->offer/100)), 0)}} @else Rs.{{number_format($tr->price, 0)}} @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Left Sidebar End -->

    <!-- Related Product Section Start -->
    <section class="product-list-section section-b-space">
        <div class="container-fluid-lg">
            <div class="title">
                <h2>{{$farm->farm_name}} Products</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-6_1 product-wrapper">
                        @foreach ($related as $re)
                        <div>
                            <div class="product-box-3 wow fadeInUp">
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
                                            @if($re->offer)<del>Rs.{{number_format($re->price, 0)}}</del>@endif
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
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection

@section('model')
    <!-- Review Modal Start -->
    <div class="modal fade theme-modal question-modal" id="writereview" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Write a review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <form class="product-review-form" id="registerForm" method="post" action="{{url('/product/'.$product->id.'/review')}}">
                {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="product-wrapper">
                            <div class="product-image">
                                <img class="img-fluid" alt="Solid Collared Tshirts"
                                    src="{{ asset('/storage/product/'.$product->image_1) }}">
                            </div>
                            <div class="product-content">
                                <h5 class="name">{{$product->name}}</h5>
                                <div class="product-review-rating">
                                    <div class="product-rating">
                                        <h6 class="price-number">
                                            Rs.@if($re->offer) {{number_format($product->price - ($product->price * ($product->offer/100)), 0)}} @else {{number_format($product->price, 0)}} @endif
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="review-box">
                            <label for="content" class="form-label">Rating *</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="" selected>Select Rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                        <div class="review-box">
                            <label for="content" class="form-label">Your Question *</label>
                            <textarea id="content" name="review" rows="3" class="form-control" placeholder="Your Question"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-md btn-theme-outline fw-bold"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-md fw-bold text-light theme-bg-color">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Review Modal End -->
@endsection
