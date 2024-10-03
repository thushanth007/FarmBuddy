@extends('site.layout.default')

@section('title') Shop - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Farm Shop</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Farm Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Grid Section Start -->
    <section class="seller-grid-section">
        <div class="container-fluid-lg">
            <div class="row g-4 pb-5">
                @foreach ($farms as $f)
                <div class="col-xxl-4 col-md-6">
                    <a href="{{ url('/product/shop/' . $f->id . '/view') }}" class="seller-grid-box">
                        <div class="grid-contain">
                            <div class="seller-contact-details">
                                <div class="seller-contact">
                                    <div class="seller-icon">
                                        <i class="fa-solid fa-map-pin"></i>
                                    </div>

                                    <div class="contact-detail">
                                        <h5>Address: <span> {{$f->street}}, {{$f->city}}, {{$f->postal_code}}</span></h5>
                                    </div>
                                </div>

                                <div class="seller-contact">
                                    <div class="seller-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>

                                    <div class="contact-detail">
                                        <h5>Contact Us: <span>{{$f->phone}}</span></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="contain-name">
                                <div>
                                    <h6>Since {!!$f->created_at->format('Y')!!}</h6>
                                    <h3>{{$f->farm_name}}</h3>
                                    <div class="product-rating">
                                        <ul class="rating">
                                            @if($f->average_rating > 4 || $f->average_rating == 0)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            @elseif($f->average_rating > 3 && $f->average_rating <= 4)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            @elseif($f->average_rating > 2 && $f->average_rating <= 3)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @elseif($f->average_rating > 1 && $f->average_rating <= 2)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @elseif($f->average_rating > 0 && $f->average_rating <= 1)
                                            <li><i data-feather="star" class="fill"></i></li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            <li><i data-feather="star"></i> </li>
                                            @endif
                                        </ul>
                                        <h6 class="theme-color ms-2">({{round($f->average_rating, 1)}})</h6>
                                    </div>
                                    <span class="product-label">3 Products</span>
                                </div>

                                <div class="grid-image">
                                    <img src="{{ asset('site/assets/images/vendor-page/logo/3.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <nav class="custom-pagination pb-5">
                <ul class="pagination justify-content-center">
                    <!-- Previous Page Link -->
                    @if ($farms->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $farms->previousPageUrl() }}" tabindex="-1">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($farms->links()->elements as $element)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($element))
                            <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">{{ $element }}</a></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $farms->currentPage())
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($farms->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $farms->nextPageUrl() }}">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <a class="page-link" href="javascript:void(0)">
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>

        </div>
    </section>
    <!-- Grid Section End -->
@endsection
