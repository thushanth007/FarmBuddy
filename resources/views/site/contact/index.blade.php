@extends('site.layout.default')

@section('title') Contact Us @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Contact Us</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Contact Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Box Section Start -->
    <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3 pb-5">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-image">
                                    <img src="{{ asset('site/assets/images/inner-page/contact-us.png') }}"
                                        class="img-fluid blur-up lazyloaded" alt="">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact-title">
                                    <h3>Get In Touch</h3>
                                </div>

                                <div class="contact-detail">
                                    <div class="row g-4">
                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Phone</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{$contact->phone}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Email</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{$contact->email}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Head Office</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>Colombo 06, Srilanka</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-building"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>Branch</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{$contact->address}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="title d-xxl-none d-block">
                        <h2>Contact Us</h2>
                    </div>

                    @if(session('info'))<div class="alert alert-success">{{ session('info') }}</div>@endif
                    @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                    @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

                    <form id="contactForm" method="post" action="{{url('/contact')}}">
                    {{ csrf_field() }}

                        <div class="right-sidebar-box">
                            <div class="row">
                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput" class="form-label">First Name</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="exampleFormControlInput" name="f_name" placeholder="Enter First Name">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('f_name')!!}</em>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="exampleFormControlInput1" name="l_name" placeholder="Enter Last Name">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('l_name')!!}</em>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput2" class="form-label">Email Address</label>
                                        <div class="custom-input">
                                            <input type="email" class="form-control" id="exampleFormControlInput2" name="email" placeholder="Enter Email Address">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('email')!!}</em>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput3" class="form-label">Phone Number</label>
                                        <div class="custom-input">
                                            <input type="tel" class="form-control" id="exampleFormControlInput3" name="phone" placeholder="Enter Your Phone Number" maxlength="12">
                                            <i class="fa-solid fa-mobile-screen-button"></i>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('phone')!!}</em>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlTextarea" class="form-label">Message</label>
                                        <div class="custom-textarea">
                                            <textarea class="form-control" id="exampleFormControlTextarea" name="message" placeholder="Enter Your Message" rows="6"></textarea>
                                            <i class="fa-solid fa-message"></i>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('message')!!}</em>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-animation btn-md fw-bold ms-auto">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Box Section End -->
@endsection
