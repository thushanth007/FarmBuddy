@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Setting <small>Manage web-site settings</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"> Setting</li>
        </ol>
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

    <div class="tab-content">
        <div class="tab-pane active">
            {!!Form::model($singleData, array('files' => true, 'url' => 'admin/setting', 'autocomplete' => 'off'))!!}
            {!!csrf_field()!!}
            <div class="row">
                <div class="col-md-4 col-md-push-8">
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            {!!Form::label("Meta Title")!!}
                            {!!Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Enter meta title'))!!}
                            <em class="error-msg">{!!$errors->first('title')!!}</em>
                        </div>
                        <div class="form-group {{ $errors->has('keywords') ? 'has-error' : '' }}">
                            {!!Form::label("Meta keywords")!!}
                            {!!Form::text('keywords', null, array('class' => 'form-control', 'placeholder' => 'Enter meta keywords'))!!}
                            <em class="error-msg">{!!$errors->first('keywords')!!}</em>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            {!!Form::label("Meta Description")!!}
                            {!!Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Enter meta description', 'rows'=>'3'))!!}
                            <em class="error-msg">{!!$errors->first('description')!!}</em>
                        </div>
                        <div class="form-group {{ $errors->has('google_analytics') ? 'has-error' : '' }}">
                            {!!Form::label("Google Analytics Code")!!}
                            {!!Form::text('google_analytics', null, array('class' => 'form-control', 'placeholder' => 'Enter google analytics code'))!!}
                            <em class="error-msg">{!!$errors->first('google_analytics')!!}</em>
                        </div>
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                                {!!Form::label("Logo Image")!!}
                                {!!Form::file('logo')!!}
                                <em>Logo size (310 x 65)px</em>
                                <em class="error-msg">{!!$errors->first('logo')!!}</em>
                                @if($singleData->logo)
                                <div class="PT10">
                                    <img src="{{ asset('/storage/setting/'.$singleData->logo) }}" alt="Image" class="img-thumbnail"/>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-md-pull-4">
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!!Form::label("Site name *")!!}
                            {!!Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter site name'))!!}
                            <em class="error-msg">{!!$errors->first('name')!!}</em>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                                {!!Form::label("Phone No")!!}
                                {!!Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Enter phone number'))!!}
                                <em class="error-msg">{!!$errors->first('phone')!!}</em>
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                {!!Form::label("Email *")!!}
                                {!!Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email address'))!!}
                                <em class="error-msg">{!!$errors->first('email')!!}</em>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            {!!Form::label("Address ")!!}
                            {!!Form::textarea('address', null, array('class' => 'form-control', 'placeholder' => 'Enter the address', 'rows'=>'3'))!!}
                            <em class="error-msg">{!!$errors->first('address')!!}</em>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                                {!!Form::label("Facebook")!!}
                                {!!Form::text('facebook', null, array('class' => 'form-control', 'placeholder' => 'Enter facebook link'))!!}
                                <em class="error-msg">{!!$errors->first('facebook')!!}</em>
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                                {!!Form::label("Twitter ")!!}
                                {!!Form::text('twitter', null, array('class' => 'form-control', 'placeholder' => 'Enter twitter link'))!!}
                                <em class="error-msg">{!!$errors->first('twitter')!!}</em>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                                {!!Form::label("Instagram")!!}
                                {!!Form::text('instagram', null, array('class' => 'form-control', 'placeholder' => 'Enter instagram link'))!!}
                                <em class="error-msg">{!!$errors->first('instagram')!!}</em>
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
                                {!!Form::label("Youtube ")!!}
                                {!!Form::text('youtube', null, array('class' => 'form-control', 'placeholder' => 'Enter youtube link'))!!}
                                <em class="error-msg">{!!$errors->first('youtube')!!}</em>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
                            {!!Form::label("About Us")!!}
                            {!!Form::textarea('about', null, array('class' => 'form-control', 'placeholder' => 'Enter about us', 'rows' => 6))!!}
                            <em class="error-msg">{!!$errors->first('about')!!}</em>
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
