@extends('site.layout.default')

@section('title') login - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Sign In</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Sign In</li>
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
                <div class="col-8 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{ asset('site/assets/images/inner-page/sign-up.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-4 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Farmbuddy</h3>
                            <h4>Log In Your Account</h4>
                        </div>


                        @if(session('info'))<div class="pb-3"><div class="alert alert-success">{{ session('info') }}</div></div>@endif
                        @if(session('error'))<div class="pb-3"><div class="alert alert-danger">{{ session('error') }}</div></div>@endif
                        @if(count($errors) > 0)<div class="pb-3"><div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div></div>@endif
                        

                        <div class="input-box">
                            <form class="row g-4" id="registerForm" method="post" action="{{url('/login')}}">
                            {{ csrf_field() }}
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                        <label for="email">Email *</label>
                                        <em class="error-msg">{!!$errors->first('email')!!}</em>
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
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" id="flexCheckDefault" name="remember-2">
                                            <label class="form-check-label" for="flexCheckDefault">Keep me logged in</label>
                                        </div>
                                        <em class="error-msg">{!!$errors->first('remember-2')!!}</em>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">Log In</button>
                                </div>
                            </form>

                            <div class="other-log-in">
                                <h6></h6>
                            </div>

                            <div class="sign-up-box">
                                <h4>Don't have an account?</h4>
                                <a href="{{url('/user-register')}}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection
