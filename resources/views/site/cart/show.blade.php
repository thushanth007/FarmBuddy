@extends('site.layout.default')

@section('title') Cart - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            <table class="table">
                                <tbody>
                                    @foreach ($cartItems as $ci)
                                    <tr class="product-box-contain">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="{{url('/product/' . $ci->id . '/view')}}" class="product-image">
                                                    <img src="{{ asset('/storage/product/'. $ci->attributes->get('image')) }}" class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="{{url('/product/' . $ci->id . '/view')}}">{{$ci->name}}</a>
                                                        </li>

                                                        <li class="text-content">
                                                            <span class="text-title">Quantity</span> {{$ci->attributes->get('unit')}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">Price</h4>
                                            <h5>
                                                @if($ci->attributes->get('offer')) Rs.{{number_format($ci->price - ($ci->price * ($ci->attributes->get('offer')/100)), 0)}} @else Rs.{{number_format($ci->price, 0)}} @endif
                                                @if($ci->attributes->get('offer'))<del class="text-content">Rs.{{number_format($ci->price, 0)}}</del>@endif
                                            </h5>
                                            <h6 class="theme-color">You Save : Rs. {{$ci->price * ($ci->attributes->get('offer')/100)}}</h6>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">Qty</h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    @php $url = 'cart/update/'.$ci->id @endphp
                                                    {!! Form::model(null, array('files' => true, 'url' => $url, 'autocomplete' => 'off')) !!}
                                                    {!!csrf_field()!!}
                                                    <div class="input-group">
                                                        <button type="submit" class="btn qty-left-minus" data-type="minus" data-field="">
                                                            <i class="fa fa-minus ms-0"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="text" name="qty" value="{{$ci->quantity}}">
                                                        <button type="submit" class="btn qty-right-plus" data-type="plus" data-field="">
                                                            <i class="fa fa-plus ms-0"></i>
                                                        </button>
                                                        
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content">Total</h4>
                                            <h5>
                                            @if($ci->attributes->get('offer')) Rs.{{number_format((($ci->price - ($ci->price * ($ci->attributes->get('offer')/100))) * $ci->quantity), 0)}} @else Rs.{{number_format(($ci->price * $ci->quantity), 0)}} @endif
                                            </h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">Action</h4>
                                            <a class="remove close_button" href="{{url('/cart/remove/' . $ci->id)}}">Remove</a>
                                        </td>
                                    </tr>
                                    <em class="error-msg">{!!$errors->first('qty')!!}</em>
                                    @endforeach

                                    @if(count($cartItems) == 0)
                                    <div class="col-12">
                                        <div class="product-box-3 txt-align-center">
                                            <h5 class="name">No data available at this time.</h5>
                                        </div>
                                    </div>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">Rs.{{$totalAmount}}</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Tax</h4>
                                    <h4 class="price text-end">Rs.0</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (LKR)</h4>
                                <h4 class="price theme-color">Rs.{{$totalAmount}}</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = '{{url('/user/checkout')}}';"
                                        class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = '{{url('/')}}';"
                                        class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->
@endsection
