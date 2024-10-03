@extends('site.layout.default')

@section('title') Checkout - Farm Buddy @endsection

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadcrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{url('/')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <div class="container-fluid-lg">
            @if(session('info'))<div class="pb-3"><div class="alert alert-success">{{ session('info') }}</div></div>@endif
            @if(session('error'))<div class="pb-3"><div class="alert alert-danger">{{ session('error') }}</div></div>@endif
            @if(count($errors) > 0)<div class="pb-3"><div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div></div>@endif

            @php $url = 'user/order'; @endphp
            {!! Form::model(null, ['files' => true, 'url' => $url, 'autocomplete' => 'off']) !!}
            {!! csrf_field() !!}
            <div class="row g-sm-4 g-3">

                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                            trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Delivery Address</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-12 col-lg-12 col-md-12">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="jack" id="address" checked="checked">
                                                            </div>

                                                            <div class="label">
                                                                <label>Home</label>
                                                            </div>

                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500">{{$basic->first_name}} {{$basic->last_name}}</h4>
                                                                </li>

                                                                <li>
                                                                    <p class="text-content"><span
                                                                            class="text-title">Address : </span>{{$basic->street}}, {{$basic->city}}, {{$basic->postal_code}}</p>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content"><span
                                                                            class="text-title">Phone Code :</span> +94</h6>
                                                                </li>

                                                                <li>
                                                                    <h6 class="text-content mb-0"><span
                                                                            class="text-title">Phone :</span>{{$basic->phone}}</h6>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Delivery Option</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div
                                                                    class="form-check mb-0 custom-form-check show-box-checked">
                                                                    <input class="form-check-input" type="radio" name="delivery_option" value="Express Delivery" id="future" @if($type == 'Express Delivery') checked  @endif onclick="submitForm()">
                                                                    <label class="form-check-label" for="future">Express Delivery</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div
                                                                    class="form-check custom-form-check hide-check-box">
                                                                    <input class="form-check-input" type="radio" name="delivery_option" value="Click and Collect" id="standard" @if($type == 'Click and Collect') checked @endif onclick="submitForm()">
                                                                    <label class="form-check-label"
                                                                        for="standard">Click and Collect</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Payment Option</h4>
                                        </div>

                                        <input type="hidden" name="shipping" value="{{$shipping}}">

                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingOne">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="credit">
                                                                    <input class="form-check-input mt-0" type="radio" name="payment_type" value="Credit" id="credit" checked>
                                                                    Credit or Debit Card
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseOne"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p class="cod-review"> Credit cards often come with additional benefits like rewards points, cash-back offers, and fraud protection, making them a convenient option for managing larger expenses or unexpected costs.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Order Summery</h3>
                            </div>

                            <ul class="summery-contain">
                                @foreach ($cartItems as $ci)
                                <li>
                                    <img src="{{ asset('/storage/product/'. $ci->attributes->get('image')) }}"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>{{$ci->name}} <span>X {{$ci->quantity}}</span></h4>
                                    <h4 class="price">
                                        @if($ci->attributes->get('offer')) Rs.{{number_format($ci->price - ($ci->price * ($ci->attributes->get('offer')/100)), 0)}} @else Rs.{{number_format($ci->price, 0)}} @endif
                                    </h4>
                                </li>
                                @endforeach
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">Rs.{{$totalAmount}}</h4>
                                </li>

                                @if($type == 'Express Delivery')
                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price">Rs.{{$shipping}}</h4>
                                </li>
                                @endif

                                <li>
                                    <h4>Tax</h4>
                                    <h4 class="price">Rs.0</h4>
                                </li>

                                <li class="list-total">
                                    <h4>Total (LKR)</h4>
                                    <h4 class="price">Rs. @if($type == 'Express Delivery') {{$totalAmount + $shipping}} @else {{$totalAmount}} @endif</h4>
                                </li>
                            </ul>
                        </div>

                        @php $url = 'user/order' @endphp
                        {!! Form::model(null, array('files' => true, 'url' => $url, 'autocomplete' => 'off')) !!}
                        {!!csrf_field()!!}
                            <button type="submit" class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </div>
    </section>
    <!-- Checkout section End -->
@endsection

@section('script')
<script>
    function submitForm() {

        const selectedElement = document.querySelector('input[name="delivery_option"]:checked');

        // Check if a radio button is selected
        if (selectedElement) {
            const selectedValue = selectedElement.value;

            // Construct the URL with the selected value as a query parameter
            const url = `{{ url('user/checkout') }}?delivery_option=${encodeURIComponent(selectedValue)}`;

            // Redirect to the constructed URL
            window.location.href = url;
        } else {
            alert('Please select a delivery option.');
        }


    }
</script>
@endsection
