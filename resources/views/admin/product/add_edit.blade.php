@extends('admin.layout.default')

@section('content')
    <section class="content-header">
        <h1>Product<small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/seller-dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('admin/seller-product') }}"> Product</a></li>
            <li class="active">@if ($singleData->id) Edit @else Add New @endif</li>
        </ol>
    </section>

    <section class="content">
        <div class="nav-tabs-custom">
            @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if (session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
            @if (count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>@endif

            <ul class="nav nav-tabs">
                <li @if(Request::is('*seller-product')) class="active" @endif><a href="{{url('admin/seller-product')}}"><i class="fa fa-bars"></i> <span> Mange</span></a></li>
                @if(empty($singleData->id))
                    <li @if(Request::is('*seller-product/add')) class="active" @endif><a href="{{url('admin/seller-product/add')}}"><i class="fa fa-plus"></i> <span> Add</span></a></li>
                @else
                    <li @if(Request::is('*seller-product/'. $singleData->id .'/edit')) class="active" @endif><a href="{{url('admin/seller-product/'. $singleData->id .'/edit')}}"><i class="fa fa-pensil"></i> <span> Edit</span></a></li>
                    <li @if(Request::is('*seller-product/'. $singleData->id .'/view')) class="active" @endif><a href="{{url('admin/seller-product/'. $singleData->id .'/view')}}"><i class="fa fa-search-plus"></i> <span> View</span></a></li>
                @endif
            </ul>

            @php
                $section = [
                    'New' => 'New Products',
                    'Trending' => 'Trending Products'
                ];

                $unit = [
                    'Count' => 'Count',
                    'Kg' => 'Kg',
                    'Gram' => 'Gram',
                    'Liter' => 'Liter',
                    'Milliliter' => 'Milliliter',
                    'Meter' => 'Meter',
                    'Centimeter' => 'Centimeter',
                    'Inch' => 'Inch',
                    'Foot' => 'Foot',
                    'Pound' => 'Pound',
                    'Ounce' => 'Ounce',
                    'Piece' => 'Piece',
                    'Pack' => 'Pack',
                    'Box' => 'Box',
                    'Dozen' => 'Dozen',
                ];

            @endphp

            <div class="tab-content">
                <div class="tab-pane active">
                    @php $url = isset($singleData->id) ? 'admin/seller-product/' . $singleData->id . '/edit' : 'admin/seller-product/add'; @endphp
                    {!! Form::model($singleData, ['files' => true, 'url' => $url, 'autocomplete' => 'off']) !!}
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-4 col-md-push-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Category *</label>
                                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Select category']) !!}
                                    <em class="error-msg">{!! $errors->first('category_id') !!}</em>
                                </div>

                                <div class="form-group">
                                    <label>Display Section</label>
                                    {!!Form::select('section', $section, null, array('class' => 'form-control', 'placeholder' => 'Select section')) !!}
                                    <em class="error-msg">{!!$errors->first('section')!!}</em>
                                </div>

                                <div class="form-group">
                                    {!!Form::label("Image 1 *")!!}
                                    {!!Form::file('image_1')!!}
                                    <em>Image size (184 x 145)px</em>
                                    <em class="error-msg">{!!$errors->first('image_1')!!}</em>
                                    @if($singleData->image_1)
                                    <div class="PT10">
                                        <img src="{{ asset('/storage/product/'.$singleData->image_1) }}" alt="Image"  width="80px" height="80px" class="img-thumbnail"/>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    {!!Form::label("Image 2")!!}
                                    {!!Form::file('image_2')!!}
                                    <em>Image size (750 x 750)px</em>
                                    <em class="error-msg">{!!$errors->first('image_2')!!}</em>
                                    @if($singleData->image_2)
                                    <div class="PT10">
                                        <img src="{{ asset('/storage/product/'.$singleData->image_2) }}" alt="Image"  width="80px" height="80px" class="img-thumbnail"/>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    {!!Form::label("Image 3")!!}
                                    {!!Form::file('image_3')!!}
                                    <em>Image size (750 x 750)px</em>
                                    <em class="error-msg">{!!$errors->first('image_3')!!}</em>
                                    @if($singleData->image_3)
                                    <div class="PT10">
                                        <img src="{{ asset('/storage/product/'.$singleData->image_3) }}" alt="Image"  width="80px" height="80px" class="img-thumbnail"/>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    {!!Form::label("Image 4")!!}
                                    {!!Form::file('image_4')!!}
                                    <em>Image size (750 x 750)px</em>
                                    <em class="error-msg">{!!$errors->first('image_4')!!}</em>
                                    @if($singleData->image_4)
                                    <div class="PT10">
                                        <img src="{{ asset('/storage/product/'.$singleData->image_4) }}" alt="Image"  width="80px" height="80px" class="img-thumbnail"/>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 col-md-pull-4">
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label>Product Name *</label>
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
                                    <em class="error-msg">{!! $errors->first('name') !!}</em>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Unit *</label>
                                        {!!Form::select('unit', $unit, null, array('class' => 'form-control', 'placeholder' => 'Select unit')) !!}
                                        <em class="error-msg">{!!$errors->first('unit')!!}</em>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>Price (LKR) *</label>
                                        {!!Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Enter price')) !!}
                                        <em class="error-msg">{!!$errors->first('price')!!}</em>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>Stock (Count) *</label>
                                        {!!Form::text('stock', null, array('class' => 'form-control', 'placeholder' => 'Enter stock')) !!}
                                        <em class="error-msg">{!!$errors->first('stock')!!}</em>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>Offer (%)</label>
                                        {!!Form::text('offer', null, array('class' => 'form-control', 'placeholder' => 'Enter offer')) !!}
                                        <em class="error-msg">{!!$errors->first('offer')!!}</em>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Type *</label>
                                        {!!Form::text('type', null, array('class' => 'form-control', 'placeholder' => 'Enter type')) !!}
                                        <em class="error-msg">{!!$errors->first('type')!!}</em>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>SKU *</label>
                                        {!!Form::text('sku', null, array('class' => 'form-control', 'placeholder' => 'Enter sku')) !!}
                                        <em class="error-msg">{!!$errors->first('sku')!!}</em>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label>Information *</label>
                                    {!! Form::textarea('information', null, ['class' => 'form-control', 'rows' => '2']) !!}
                                    <em class="error-msg">{!! $errors->first('information') !!}</em>
                                </div>

                                <div class="form-group">
                                    <label>Additional Info</label>
                                    {!! Form::textarea('additional_info', null, ['class' => 'form-control', 'rows' => '2']) !!}
                                    <em class="error-msg">{!! $errors->first('additional_info') !!}</em>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '3']) !!}
                                    <em class="error-msg">{!! $errors->first('description') !!}</em>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="pull-right form-group">
                                    <div class="anil_nepal">
                                        <label class="switch switch-left-right" title="@if ($singleData->is_status == 1) Enabled @else Disabled @endif">
                                            <input class="switch-input" type="checkbox" name="is_status" value="1" @if ($singleData->is_status == 1) checked @endif>
                                            <span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check-circle-o"></i> @if ($singleData->id) update @else create @endif
                                </button>
                                <a class="btn btn-default" href="{{ URL::previous() }}"><i
                                        class="fa fa-times-circle-o"></i> Cancel</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
