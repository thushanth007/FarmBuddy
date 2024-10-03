@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Admin Profile <small>Manage web-site Profile</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"> Profile</li>
        </ol>
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

    <div class="tab-content">
        <div class="tab-pane active">
            {!!Form::model($singleData, array('files' => true, 'url' => 'admin/profile', 'autocomplete' => 'off'))!!}
            {!!csrf_field()!!}
            <div class="row">
                <div class="col-md-4 col-md-push-8">
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            {!!Form::label("Profile Image")!!}
                            @if ($singleData->id && !empty($singleData->image))
                                {!!Form::file('image')!!}
                                <em class="error-msg">{!!$errors->first('image')!!}</em>
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{asset('storage/profile/'.$singleData->image)}}" alt="Profile Image" class="img-thumbnail"/>
                                    </div>
                                </div>
                            @else{!!Form::file('image')!!}@endif

                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-pull-4">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                {!!Form::label("Name *")!!}
                                {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name'])!!}
                                <em class="error-msg">{!!$errors->first('name')!!}</em>
                            </div>
                            <div class="col-sm-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!!Form::label("Email (username) *")!!}
                                {!!Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email (Username)'])!!}
                                <em class="error-msg">{!!$errors->first('email')!!}</em>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                {!! Form::label("Password *") !!}
                                {!! Form::password('password', ['class'=>'form-control', 'placeholder' => 'Enter password']) !!}
                                <em class="error-msg">{!!$errors->first('password')!!}</em>
                            </div>
                            <div class="col-sm-6 form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                                {!! Form::label("Confirm password *") !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder' => 'Enter confirm password']) !!}
                                <em class="error-msg">{!!$errors->first('confirm_password')!!}</em>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check-circle-o"></i> @if($singleData->id) update @else create @endif
                        </button>
                        <a class="btn btn-default" href="{{URL::previous()}}"><i class="fa fa-times-circle-o"></i> Cancel</a>
                    </div>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
</section>
@endsection