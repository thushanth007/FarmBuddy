@extends('site.layout.default')

@section('title') Farm Buddy - Seller Register @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Farmer Sign Up</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Farmer Sign Up</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('site/assets/images/inner-page/sign-up.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Farmbuddy</h3>
                            <h4>Create New Seller Account</h4>
                        </div>


                        @if(session('info'))<div class="pb-3"><div class="alert alert-success">{{ session('info') }}</div></div>@endif
                        @if(session('error'))<div class="pb-3"><div class="alert alert-danger">{{ session('error') }}</div></div>@endif
                        @if(count($errors) > 0)<div class="pb-3"><div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div></div>@endif
                        

                        <div class="input-box">
                            <form class="row g-4" id="registerForm" method="post" action="{{url('/seller-register')}}">
                            {{ csrf_field() }}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::text('farm_name', null, ['class' => 'form-control']) !!}
                                        <label for="fullname">Farm Name *</label>
                                        <em class="error-msg">{!!$errors->first('farm_name')!!}</em>
                                    </div>
                                </div>
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
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password" name="password">
                                        <label for="password">Password *</label>
                                        <em class="error-msg">{!!$errors->first('password')!!}</em>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                                        <label for="fullname">Product Category *</label>
                                        <em class="error-msg">{!!$errors->first('category_id')!!}</em>
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

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <body onload="initMap()">
                                            <h5>Click on the map to get latitude and longitude:</h5>
                                            <div id="map" style="width: 100%; height: 200px;"></div>
                                        </body>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::text('latitude', null, ['class' => 'form-control', 'id' => 'lat', 'readonly' => 'readonly']) !!}
                                        <label for="fullname">Latitude</label>
                                        <em class="error-msg">{!!$errors->first('latitude')!!}</em>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::text('longitude', null, ['class' => 'form-control', 'id' => 'lng', 'readonly' => 'readonly']) !!}
                                        <label for="fullname">Longitude</label>
                                        <em class="error-msg">{!!$errors->first('longitude')!!}</em>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::text('bank_name', null, ['class' => 'form-control']) !!}
                                        <label for="fullname">Bank Name *</label>
                                        <em class="error-msg">{!!$errors->first('bank_name')!!}</em>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::text('bank_account_number', null, ['class' => 'form-control']) !!}
                                        <label for="fullname">Bank Account No *</label>
                                        <em class="error-msg">{!!$errors->first('bank_account_number')!!}</em>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault" name="is_agreed">
                                            <label class="form-check-label" for="flexCheckDefault">I agree with
                                                <span>Terms</span> and <span>Privacy</span>
                                            </label>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('is_agreed')!!}</em>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
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
