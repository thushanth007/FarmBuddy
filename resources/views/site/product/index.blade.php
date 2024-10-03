@extends('site.layout.default')

@section('title') Product - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>{{$title}}</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">{{$title}}</li>
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

                            <div class="accordion custom-accordion" id="accordionExample">
                                <form id="filterForm" action="{{ url('product/filter') }}" method="POST">
                                @csrf
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne">
                                                <span>Categories</span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <ul class="category-list custom-padding custom-height">
                                                    @foreach ($category as $c)
                                                    <li>
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            {!! Form::checkbox('category[]',  $c->id, false, ['class' => 'checkbox_animated', 'id'=> $c->id, 'onchange' => 'submitForm()']) !!}
                                                            <label class="form-check-label" for="{{$c->id}}">
                                                                <span class="name">{{$c->title}}</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item pt-3">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                                <span>Discount</span>
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse show">
                                            <div class="accordion-body">
                                                <ul class="category-list custom-padding">
                                                    <li>
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            {!! Form::checkbox('selectedOffers[]', 5, false, ['class' => 'checkbox_animated', 'id'=> 5, 'onchange' => 'submitForm()']) !!}
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                <span class="name">upto 5%</span>
                                                            </label>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            {!! Form::checkbox('selectedOffers[]', 10, false, ['class' => 'checkbox_animated', 'id'=> 10, 'onchange' => 'submitForm()']) !!}
                                                            <label class="form-check-label" for="flexCheckDefault1">
                                                                <span class="name">5% - 10%</span>
                                                            </label>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            {!! Form::checkbox('selectedOffers[]', 15, false, ['class' => 'checkbox_animated', 'id'=> 15, 'onchange' => 'submitForm()']) !!}
                                                            <label class="form-check-label" for="flexCheckDefault2">
                                                                <span class="name">10% - 15%</span>
                                                            </label>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            {!! Form::checkbox('selectedOffers[]', 25, false, ['class' => 'checkbox_animated', 'id'=> 25, 'onchange' => 'submitForm()']) !!}
                                                            <label class="form-check-label" for="flexCheckDefault3">
                                                                <span class="name">15% - 25%</span>
                                                            </label>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            {!! Form::checkbox('selectedOffers[]', 100, false, ['class' => 'checkbox_animated', 'id'=> 100, 'onchange' => 'submitForm()']) !!}
                                                            <label class="form-check-label" for="flexCheckDefault4">
                                                                <span class="name">More than 25%</span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
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
                                            <a class="dropdown-item" id="pop" href="javascript:void(0)">Most Popular</a>
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
                        @foreach ($products as $pr)
                        <div>
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="{{url('/product/' . $pr->id . '/view')}}">
                                            <img src="{{ asset('/storage/product/'.$pr->image_1) }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <a href="{{url('/product/' . $pr->id . '/view')}}">
                                            <h5 class="name">{{$pr->name}}</h5>
                                        </a>
                                        <div class="product-rating mt-2">
                                            <ul class="rating">
                                                @if($pr->review_avg_rating  > 4 || $pr->review_avg_rating  == 0)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @elseif($pr->review_avg_rating  > 3 && $pr->review_avg_rating  <= 4)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($pr->review_avg_rating  > 2 && $pr->review_avg_rating  <= 3)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($pr->review_avg_rating  > 1 && $pr->review_avg_rating  <= 2)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @elseif($pr->review_avg_rating  > 0 && $pr->review_avg_rating  <= 1)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                <li><i data-feather="star"></i> </li>
                                                @endif
                                            </ul>
                                            <span>({{round($pr->review_avg_rating, 1)}})</span>
                                        </div>
                                        <h6 class="unit">{{$pr->unit}}</h6>
                                        <h5 class="price">
                                            <span class="theme-color">@if($pr->offer) Rs.{{number_format($pr->price - ($pr->price * ($pr->offer/100)), 0)}} @else Rs.{{number_format($pr->price, 0)}} @endif</span>
                                            @if($pr->offer)<del class="text-content">Rs.{{number_format($pr->price, 0)}}</del>@endif
                                        </h5>
                                        <div class="add-to-cart-box bg-white">
                                            <button class="btn btn-add-cart addcart-button" onclick="window.location.href='{{url('/product/' . $pr->id . '/view')}}'">Add
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

                    @if(count($products) == 0)
                        <div class="pt-5">
                            <div class="product-box-3 txt-align-center">
                                <h5 class="name">No data available at this time.</h5>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }
</script>
