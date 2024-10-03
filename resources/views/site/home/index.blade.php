@extends('site.layout.default')

@section('title') Farm Buddy - Best Price On The Market @endsection
@section('description') We are a friendly bar serving a variety of cocktails, wines and beeRs.Our bar is a perfect place for a couple. @endsection

@section('content')
    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="slider-9">
                        @foreach ($category as $c)
                        <div>
                            <a href="{{ url('/product/' . $c->id . '/category') }}" class="category-box wow fadeInUp">
                                <div>
                                    <img src="{{$c->icon}}" class="blur-up lazyload" alt="">
                                    <h5>{{$c->title}}</h5>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Product Section Start -->
    @if (count($product_1) > 0)
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2 style="text-transform: uppercase;">{{$product_1[0]->category->title}}</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">
                    @foreach ($product_1 as $p_1)
                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="{{url('/product/' . $p_1->id . '/view')}}">
                                            <img src="{{ asset('/storage/product/'.$p_1->image_1) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="product-detail">
                                        <a href="{{url('/product/' . $p_1->id . '/view')}}">
                                            <h6 class="name name-2 h-100">{{$p_1->name}}</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                @if($p_1->review_avg_rating  > 4 || $p_1->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($p_1->review_avg_rating  > 3 && $p_1->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_1->review_avg_rating  > 2 && $p_1->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_1->review_avg_rating  > 1 && $p_1->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_1->review_avg_rating  > 0 && $p_1->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($p_1->review_avg_rating, 1)}})</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 {{$p_1->unit}}</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">
                                                @if($p_1->offer) Rs.{{number_format($p_1->price - ($p_1->price * ($p_1->offer/100)), 0)}} @else Rs.{{number_format($p_1->price, 0)}} @endif
                                            </h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light" onclick="window.location.href='{{url('/product/' . $p_1->id . '/view')}}'">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Product Section End -->

    <!-- Product Section Start -->
    @if (count($product_2) > 0)
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2 style="text-transform: uppercase;">{{$product_2[0]->category->title}}</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">
                    @foreach ($product_2 as $p_2)
                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="{{url('/product/' . $p_2->id . '/view')}}">
                                            <img src="{{ asset('/storage/product/'.$p_2->image_1) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="product-detail">
                                        <a href="{{url('/product/' . $p_2->id . '/view')}}">
                                            <h6 class="name name-2 h-100">{{$p_2->name}}</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                        <ul class="rating">
                                                @if($p_2->review_avg_rating  > 4 || $p_2->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($p_2->review_avg_rating > 3 && $p_2->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_2->review_avg_rating > 2 && $p_2->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_2->review_avg_rating > 1 && $p_2->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_2->review_avg_rating  > 0 && $p_2->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($p_2->review_avg_rating, 1)}})</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 {{$p_2->unit}}</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">
                                                @if($p_2->offer) Rs.{{number_format($p_2->price - ($p_2->price * ($p_2->offer/100)), 0)}} @else Rs.{{number_format($p_2->price, 0)}} @endif
                                            </h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light" onclick="window.location.href='{{url('/product/' . $p_2->id . '/view')}}'">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Product Section End -->

    <!-- Product Section Start -->
    @if (count($product_3) > 0)
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2 style="text-transform: uppercase;">{{$product_3[0]->category->title}}</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">
                    @foreach ($product_3 as $p_3)
                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="{{url('/product/' . $p_3->id . '/view')}}">
                                            <img src="{{ asset('/storage/product/'.$p_3->image_1) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="product-detail">
                                        <a href="{{url('/product/' . $p_3->id . '/view')}}">
                                            <h6 class="name name-2 h-100">{{$p_3->name}}</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                        <ul class="rating">
                                                @if($p_3->review_avg_rating  > 4 || $p_3->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($p_3->review_avg_rating  > 3 && $p_3->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_3->review_avg_rating  > 2 && $p_3->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_3->review_avg_rating  > 1 && $p_3->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_3->review_avg_rating  > 0 && $p_3->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($p_3->review_avg_rating, 1)}})</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 {{$p_3->unit}}</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">
                                                @if($p_3->offer) Rs.{{number_format($p_3->price - ($p_3->price * ($p_3->offer/100)), 0)}} @else Rs.{{number_format($p_3->price, 0)}} @endif
                                            </h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light" onclick="window.location.href='{{url('/product/' . $p_3->id . '/view')}}'">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Product Section End -->

    <!-- Product Section Start -->
    @if (count($product_4) > 0)
    <section>
        <div class="container-fluid-lg">
            <div class="title">
                <h2 style="text-transform: uppercase;">{{$product_4[0]->category->title}}</h2>
                <span class="title-leaf">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div class="product-border border-row">
                <div class="slider-6_2 no-arrow">
                    @foreach ($product_4 as $p_4)
                    <div>
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="product-box wow fadeIn">
                                    <div class="product-image">
                                        <a href="{{url('/product/' . $p_4->id . '/view')}}">
                                            <img src="{{ asset('/storage/product/'.$p_4->image_1) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                    <div class="product-detail">
                                        <a href="{{url('/product/' . $p_4->id . '/view')}}">
                                            <h6 class="name name-2 h-100">{{$p_4->name}}</h6>
                                        </a>

                                        <div class="product-rating mt-2">
                                        <ul class="rating">
                                                @if($p_4->review_avg_rating  > 4 || $p_4->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($p_4->review_avg_rating  > 3 && $p_4->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_4->review_avg_rating  > 2 && $p_4->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_4->review_avg_rating  > 1 && $p_4->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($p_4->review_avg_rating  > 0 && $p_4->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($p_4->review_avg_rating, 1)}})</span>
                                        </div>

                                        <h6 class="sold weight text-content fw-normal">1 {{$p_4->unit}}</h6>

                                        <div class="counter-box">
                                            <h6 class="sold theme-color">Rs.{{number_format($p_4->price, 0)}}
                                                @if($p_4->offer) Rs.{{number_format($p_4->price - ($p_4->price * ($p_4->offer/100)), 0)}} @else Rs.{{number_format($p_4->price, 0)}} @endif
                                            </h6>

                                            <div class="addtocart_btn">
                                                <button class="add-button addcart-button btn buy-button text-light" onclick="window.location.href='{{url('/product/' . $p_4->id . '/view')}}'">
                                                    <span>Add</span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Product Section End -->

    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="slider-4-1">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Selling</h3>
                                </div>
                                @foreach ($top_selling as $ts)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{url('/product/' . $ts->id . '/view')}}" class="top-selling-image">
                                        <img src="{{ asset('/storage/product/'.$ts->image_1) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="{{url('/product/' . $ts->id . '/view')}}">
                                            <h5>{{$ts->name}}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if($ts->review_avg_rating  > 4 || $ts->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($ts->review_avg_rating  > 3 && $ts->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($ts->review_avg_rating  > 2 && $ts->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($ts->review_avg_rating  > 1 && $ts->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($ts->review_avg_rating  > 0 && $ts->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($ts->review_avg_rating, 1)}})</span>
                                        </div>
                                        <h6>
                                            @if($ts->offer) Rs.{{number_format($ts->price - ($ts->price * ($ts->offer/100)), 0)}} @else Rs.{{number_format($ts->price, 0)}} @endif
                                        </h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Trending Products</h3>
                                </div>

                                @foreach ($trending as $tr)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{url('/product/' . $tr->id . '/view')}}" class="top-selling-image">
                                        <img src="{{ asset('/storage/product/'.$tr->image_1) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="{{url('/product/' . $tr->id . '/view')}}">
                                            <h5>{{$tr->name}}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if($tr->review_avg_rating  > 4 || $tr->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($tr->review_avg_rating  > 3 && $tr->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($tr->review_avg_rating  > 2 && $tr->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($tr->review_avg_rating  > 1 && $tr->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($tr->review_avg_rating  > 0 && $tr->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($tr->review_avg_rating, 1)}})</span>
                                        </div>
                                        <h6>
                                            @if($tr->offer) Rs.{{number_format($tr->price - ($tr->price * ($tr->offer/100)), 0)}} @else Rs.{{number_format($tr->price, 0)}} @endif
                                        </h6>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Recently added</h3>
                                </div>

                                @foreach ($recently as $re)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{url('/product/' . $re->id . '/view')}}" class="top-selling-image">
                                        <img src="{{ asset('/storage/product/'.$re->image_1) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="{{url('/product/' . $re->id . '/view')}}">
                                            <h5>{{$re->name}}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if($re->review_avg_rating  > 4 || $re->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($re->review_avg_rating  > 3 && $re->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($re->review_avg_rating  > 2 && $re->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($re->review_avg_rating  > 1 && $re->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($re->review_avg_rating  > 0 && $re->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($re->review_avg_rating, 1)}})</span>
                                        </div>
                                        <h6>
                                            @if($re->offer) Rs.{{number_format($re->price - ($re->price * ($re->offer/100)), 0)}} @else Rs.{{number_format($re->price, 0)}} @endif
                                        </h6>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>New Products</h3>
                                </div>

                                @foreach ($new as $ne)
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="{{url('/product/' . $ne->id . '/view')}}" class="top-selling-image">
                                        <img src="{{ asset('/storage/product/'.$ne->image_1) }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="{{url('/product/' . $ne->id . '/view')}}">
                                            <h5>{{$ne->name}}</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                @if($ne->review_avg_rating  > 4 || $ne->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($ne->review_avg_rating  > 3 && $ne->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($ne->review_avg_rating  > 2 && $ne->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($ne->review_avg_rating  > 1 && $ne->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($ne->review_avg_rating  > 0 && $ne->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($ne->review_avg_rating, 1)}})</span>
                                        </div>
                                        <h6>
                                            @if($ne->offer) Rs.{{number_format($ne->price - ($ne->price * ($ne->offer/100)), 0)}} @else Rs.{{number_format($ne->price, 0)}} @endif
                                        </h6>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Selling Section End -->
@endsection
