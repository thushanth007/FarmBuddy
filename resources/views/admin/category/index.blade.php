@extends('admin.layout.default')

@section('content')
<section class="content-header">
    <h1>Category <small>Control panel</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category</li>
    </ol>
</section>

<section class="content">
    <div class="nav-tabs-custom">
        @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
        @if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with
            your input.</div>@endif

        <ul class="nav nav-tabs">
            <li @if(Request::is('*category*')) class="active" @endif><a href="{{url('admin/category')}}"><i
                        class="fa fa-tasks"></i> <span> category</span></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="row">

                    <div class="col-md-5">
                        @php $url = isset($category->id) ? 'admin/category/'.$category->id.'/edit' : 'admin/category'@endphp
                        {!! Form::model($category, array('files' => true, 'url' => $url, 'autocomplete' => 'off')) !!}
                        {!!csrf_field()!!}

                        <div class="box-header">
                            <h3 class="box-title">@if($category->id) Edit category @else Add New Category @endif</h3>
                        </div>

                        <div class="box-body">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                {!! Form::label("Title *") !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter category']) !!}
                                <em class="error-msg">{!!$errors->first('title')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
                                {!! Form::label("Icon *") !!}
                                {!! Form::text('icon', null, ['class' => 'form-control', 'placeholder' => 'Enter icon link']) !!}
                                <em class="error-msg">{!!$errors->first('icon')!!}</em>
                            </div>
                            <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">
                                {!!Form::label("Summery")!!}
                                {!!Form::textarea('summary', null, array('class' => 'form-control', 'placeholder' => 'Enter description', 'rows' => 4))!!}
                                <em class="error-msg">{!!$errors->first('summary')!!}</em>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="pull-right form-group">
                                <div class="anil_nepal">
                                    <label class="switch switch-left-right"
                                        title="@if($category->status == 1) Enabled @else Disabled @endif">
                                        <input class="switch-input" type="checkbox" name="status" value="1"
                                            @if($category->status == 1) checked @endif>
                                        <span class="switch-label" data-on="On" data-off="Off"></span> <span
                                            class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check-circle-o"></i> @if($category->id) update @else create @endif
                            </button>
                            <a class="btn btn-default" href="{{url('admin/category')}}"><i class="fa fa-refresh"></i>
                                Reset</a>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div class="col-md-7">
                        <div class="box-header">
                            <h3 class="box-title">List Of Category</h3>
                            <small class="pull-right">
                                <a href="{{ URL::to('admin/category') }}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus"></i> new</a>
                            </small>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Icon</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $count = 0; ?>
                                        @foreach ($categories as $row)
                                        <?php $count++; ?>
                                        <tr>
                                            <td>{{$count}}</td>
                                            <td>{!! $row->title !!}</td>
                                            <td>
                                                <img src="{{ $row->icon }}" alt="" width="30px" height="30px">
                                            </td>
                                            <td>
                                                @if($row->status == 1)
                                                <span class="label label-success">Active</span>
                                                @else
                                                <span class="label label-danger">Disabled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ URL::to('admin/category/'.$row->id.'/edit')}}"
                                                    class="btn btn-sm btn-warning"> <i class="fa fa-edit"> </i></a>
                                                @if($row->name != "system_admin")<a
                                                    href="{{ URL::to('admin/category/'.$row->id.'/delete')}}"
                                                    onclick="if(!confirm('Are you sure to delete this data?')){return false;}"
                                                    class="btn btn-sm btn-danger"><i class="fa fa-trash-o"> </i>
                                                </a>@endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
