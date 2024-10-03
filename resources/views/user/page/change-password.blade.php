@extends('site.layout.default')

@section('title') Change Password - Farm Buddy @endsection


@section('content')

<div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Candidates</h2>
                <ul>
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>Candidates Dashboard</li>
                    <li class="active">Change Password</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="candidates-change-password-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                @include('user.page.sidebar')

                </div>
                <div class="col-lg-8">
                    <div class="candidates-change-password-content">
                        <h3>Change Password</h3>
                        <p>Here you can change your password please fill up the form.</p>
                        <form class="user-form" action="{{url('user/change-password')}}" method="post">
                        {{ csrf_field() }}

                        @if(session('info'))<div class="alert alert-success">{{ session('info') }}</div>@endif
                        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
                        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some
                        problems with your input.</div>@endif

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        {!!Form::text('old_password', null, ['class' => 'form-control', 'placeholder' => 'Enter old password'])!!}
                                        <em class="error-msg">{!!$errors->first('old_password')!!}</em>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        {!!Form::text('new_password', null, ['class' => 'form-control', 'placeholder' => 'Enter new password'])!!}
                                            <em class="error-msg">{!!$errors->first('new_password')!!}</em>
                                        <i class="bx bxs-low-vision"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        {!!Form::text('confirm_password', null, ['class' => 'form-control', 'placeholder' => 'Confirm password'])!!}
                                            <em class="error-msg">{!!$errors->first('confirm_password')!!}</em>
                                        <i class="bx bxs-low-vision"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="default-btn">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
