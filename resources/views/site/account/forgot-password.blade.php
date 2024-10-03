@extends('site.layout.default')

@section('title') Reset Password - Farmbuddy @endsection

@section('content')

<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Log in</h2>
            <ul>
                <li>
                    <a href="{{url('/')}}">
                        Home
                    </a>
                </li>
                <li class="active">Forgot Password</li>
            </ul>
        </div>
    </div>
</div>

<section class="user-area ptb-100">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 box-center">
                <div class="user-form-content">
                    <h3>Forgot Password</h3>

                    <form class="user-form" action="{{url('/forgot-password')}}" method="post">
                    {{ csrf_field() }}

                        @if(session('info'))<div class="alert alert-success">{{ session('info') }}</div>@endif
                        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some
                        problems with your input.</div>@endif

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Email *</label>
                                    {!!Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email'])!!}
                                    <em class="error-msg">{!!$errors->first('email')!!}</em>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="default-btn" type="submit">
                                    Submit
                                </button>
                            </div>
                            <div class="col-12">
                                <p class="create">Don’t Have an Account? <a href="{{url('/user-register')}}">Create</a>
                                </p>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="subscribe-area subscribe-area-about-page">
    <div class="container">
        <div class="subscribe-bg">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="subscribe-content">
                        <h2>Find Your Next Great Job Opportunity!</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter email address" name="EMAIL" required
                            autocomplete="off">
                        <button class="default-btn" type="submit">
                            <span>Subscribe</span>
                        </button>
                        <div id="validator-newsletter" class="form-result"></div>
                        <p>Join The Newsletter 10,000 users Already!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
