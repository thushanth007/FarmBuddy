<div class="container-fluid-lg">
    <div class="service-section">
        <div class="row g-3">
            <div class="col-12">
                <div class="service-contain">
                    <div class="service-box">
                        <div class="service-image">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/product.svg" class="blur-up lazyload" alt="">
                        </div>

                        <div class="service-detail">
                            <h5>Every Fresh Products</h5>
                        </div>
                    </div>

                    <div class="service-box">
                        <div class="service-image">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/delivery.svg" class="blur-up lazyload" alt="">
                        </div>

                        <div class="service-detail">
                            <h5>Free Delivery Over Rs.5000</h5>
                        </div>
                    </div>

                    <div class="service-box">
                        <div class="service-image">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/discount.svg" class="blur-up lazyload" alt="">
                        </div>

                        <div class="service-detail">
                            <h5>Daily Mega Discounts</h5>
                        </div>
                    </div>

                    <div class="service-box">
                        <div class="service-image">
                            <img src="https://themes.pixelstrap.com/fastkart/assets/svg/market.svg" class="blur-up lazyload" alt="">
                        </div>

                        <div class="service-detail">
                            <h5>Best Price On The Market</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-footer section-b-space section-t-space">
        <div class="row g-md-4 g-3">
            <div class="col-3">
                <div class="footer-logo">
                    <div class="theme-logo">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('/storage/setting/'.$option->logo) }}" class="blur-up lazyload" alt="">
                        </a>
                    </div>

                    <div class="footer-logo-contain">
                        <p>{{$option->about}}</p>

                        <ul class="address">
                            <li>
                                <i data-feather="home"></i>
                                <a href="javascript:void(0)">{{$option->address}}</a>
                            </li>
                            <li>
                                <i data-feather="mail"></i>
                                <a href="javascript:void(0)">{{$option->email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="footer-title">
                    <h4>Categories</h4>
                </div>

                <div class="footer-contain">
                    <ul>
                        <li>
                            <a href="{{url('/product/1/category')}}" class="text-content">Vegetables & Fruit</a>
                        </li>
                        <li>
                            <a href="{{url('/product/2/category')}}" class="text-content">Beverages</a>
                        </li>
                        <li>
                            <a href="{{url('/product/3/category')}}" class="text-content">Meats & Seafood</a>
                        </li>
                        <li>
                            <a href="{{url('/product/4/category')}}" class="text-content">Grocery & Staples</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-3">
                <div class="footer-title">
                    <h4>Useful Links</h4>
                </div>

                <div class="footer-contain">
                    <ul>
                        <li>
                            <a href="{{url('/')}}" class="text-content">Home</a>
                        </li>
                        <li>
                            <a href="{{url('/product/shop')}}" class="text-content">Shop</a>
                        </li>
                        <li>
                            <a href="{{url('/')}}" class="text-content">About Us</a>
                        </li>
                        <li>
                            <a href="{{url('/contact-us')}}" class="text-content">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-3">
                <div class="footer-title">
                    <h4>Contact Us</h4>
                </div>

                <div class="footer-contact">
                    <ul>
                        <li>
                            <div class="footer-number">
                                <i data-feather="phone"></i>
                                <div class="contact-number">
                                    <h6 class="text-content">Hotline 24/7 :</h6>
                                    <h5>{{$option->phone}}</h5>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="footer-number">
                                <i data-feather="mail"></i>
                                <div class="contact-number">
                                    <h6 class="text-content">Email Address :</h6>
                                    <h5>{{$option->email}}</h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="sub-footer section-small-space d-flex justify-content-center align-items-center">
        <div class="reserve">
            <h6 class="text-content text-center">Copyright © {{ date('Y') }} {{ $option->name }} All rights reserved</h6>
        </div>
    </div>

</div>

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->