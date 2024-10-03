<div class="header-top">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-3 d-xxl-block d-none">
                <div class="top-left-header">
                    <i class="fa fa-map-marker text-white"></i>
                    <span class="text-white">{{$option->address}}</span>
                </div>
            </div>

            <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                <div class="header-offer">
                    <div class="notification-slider">
                        <div>
                            <div class="timer-notification">
                                <h6>
                                    <strong class="me-1">Welcome to Farmbuddy! </strong> Wrap new offers every single day on Weekends.
                                </h6>
                            </div>
                        </div>

                        <div>
                            <div class="timer-notification">
                                <h6>Something you love is now on sale! <a href="{{url('/')}}" class="text-white"> Buy Now!</a>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <ul class="about-list right-nav-about">
                    <li class="right-nav-list">
                        <div class="dropdown theme-form-select">
                            <button class="btn dropdown-toggle" type="button" id="select-language"
                                data-bs-toggle="dropdown">
                                <img src="{ asset('site/assets/images/country/united-states.png') }"
                                    class="img-fluid blur-up lazyload" alt="">
                                <span>English</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" id="english">
                                        <img src="{ asset('site/assets/images/country/united-kingdom.png') }"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <span>English</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="right-nav-list">
                        <div class="dropdown theme-form-select">
                            <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                data-bs-toggle="dropdown">
                                <span>USD</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu">
                                <li>
                                    <a class="dropdown-item" id="aud" href="javascript:void(0)">USD</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="top-nav top-header sticky-header">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="navbar-top">
                    <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                        <span class="navbar-toggler-icon">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </button>
                    <a href="{{url('/')}}" class="web-logo nav-logo">
                        <img src="{{ asset('/storage/setting/'.$option->logo) }}" class="img-fluid blur-up lazyload" alt="">
                    </a>

                    <div class="middle-box">
                        @php $url = 'product/search' @endphp
                        {!! Form::model(null, array('files' => true, 'url' => $url, 'autocomplete' => 'off')) !!}
                        {!!csrf_field()!!}
                        <div class="search-box">
                            <div class="input-group">
                                <input type="search" name='name' class="form-control" placeholder="I'm searching for...">
                                <button class="btn" type="submit" id="button-addon2">
                                    <i data-feather="search"></i>
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="rightside-box">
                        <ul class="right-side-menu">
                            <li class="right-side">
                                <div class="delivery-login-box">
                                    <div class="delivery-icon">
                                        <div class="search-box">
                                            <i data-feather="search"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="right-side">
                                <a href="{{url('/contact-us')}}" class="delivery-login-box">
                                    <div class="delivery-icon">
                                        <i data-feather="phone-call"></i>
                                    </div>
                                    <div class="delivery-detail">
                                        <h6>24/7 Delivery</h6>
                                        <h5>{{$option->phone}}</h5>
                                    </div>
                                </a>
                            </li>
                            <li class="right-side">
                                <a href="{{url('/wishlist')}}" class="btn p-0 position-relative header-wishlist">
                                    <i data-feather="heart"></i>
                                </a>
                            </li>
                            <li class="right-side">
                                <div class="onhover-dropdown header-badge">
                                    <button type="button" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="shopping-cart"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge">
                                            {{count($cartItems)}}
                                        </span>
                                    </button>

                                    <div class="onhover-div">
                                        <ul class="cart-list">
                                            @foreach ($cartItems as $ci)
                                            <li class="product-box-contain">
                                                <div class="drop-cart">
                                                    <a href="{{url('/product/' . $ci->id . '/view')}}" class="drop-image">
                                                        <img src="{{ asset('/storage/product/'. $ci->attributes->get('image')) }}" class="blur-up lazyload" alt="">
                                                    </a>

                                                    <div class="drop-contain">
                                                        <a href="{{url('/product/' . $ci->id . '/view')}}">
                                                            <h5>{{$ci->name}}</h5>
                                                        </a>
                                                        <h6><span>{{$ci->quantity}} x</span>
                                                            @if($ci->attributes->get('offer')) Rs.{{number_format($ci->price - ($ci->price * ($ci->attributes->get('offer')/100)), 0)}} @else Rs.{{number_format($ci->price, 0)}} @endif
                                                        </h6>
                                                        <button class="close-button close_button" onclick="window.location.href='{{url('/cart/remove/' . $ci->id)}}'">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>

                                        <div class="price-box">
                                            <h5>Total :</h5>
                                            <h4 class="theme-color fw-bold">Rs. {{ $totalAmount }}</h4>
                                        </div>

                                        <div class="button-group">
                                            <a href="{{url('/cart')}}" class="btn btn-sm cart-button">View Cart</a>
                                            <a href="{{url('/user/checkout')}}" class="btn btn-sm cart-button theme-bg-color text-white">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="right-side onhover-dropdown">
                                <div class="delivery-login-box">
                                    <div class="delivery-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>

                                <div class="onhover-div onhover-div-login">
                                    <ul class="user-box-name">
                                        @if(Auth::check())
                                            <li class="product-box-contain">
                                                <i></i>
                                                <h6 class="pb-1">Hi, {{ Auth::user()->name }}!</h6>
                                            </li>
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="{{url('/user/dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class="product-box-contain">
                                                <i></i>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm with-full">Logout</button>
                                                </form>
                                            </li>
                                        @else
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="{{url('/user-login')}}">Log In</a>
                                            </li>

                                            <li class="product-box-contain">
                                                <a href="{{url('/user-register')}}">Register</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid-lg">
    <div class="row">
        <div class="col-12">
            <div class="header-nav">
                <div class="header-nav-left">
                    <button class="dropdown-category">
                        <i data-feather="align-left"></i>
                        <span>All Categories</span>
                    </button>

                    <div class="category-dropdown">
                        <div class="category-title">
                            <h5>Categories</h5>
                            <button type="button" class="btn p-0 close-button text-content">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                        <ul class="category-list">
                            @foreach ($category as $c)
                            <li class="onhover-category-list">
                                <a href="{{ url('/product/' . $c->id . '/category') }}" class="category-name">
                                    <img src="{{$c->icon}}" alt="">
                                    <h6>{{$c->title}}</h6>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="header-nav-middle">
                    <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                        <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                            <div class="offcanvas-header navbar-shadow">
                                <h5>Menu</h5>
                                <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-menu" href="{{url('/')}}">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-menu" href="{{url('/product/shop')}}">Shop</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-menu" href="{{url('/seller-register')}}">Become a Seller</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-menu" href="{{url('/driver-register')}}">Become a Driver</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-menu" href="{{url('/contact-us')}}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-nav-right">
                    <button class="btn deal-button" onclick="location.href='{{url('/product/shop')}}'">
                        <i data-feather="zap"></i>
                        <span>Farm House</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>