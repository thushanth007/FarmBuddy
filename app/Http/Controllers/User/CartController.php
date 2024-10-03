<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Basic;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\FarmersBasic;
use App\Models\Product;
use Illuminate\Support\Str;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Http;
use App\Mail\StockStatusMail;
use Illuminate\Support\Facades\Mail;
use App\Models\UserOrder;

class CartController extends Controller
{

    public function showCheckout(Request $request)
    {
        $type = $request->query('delivery_option')?? 'Express Delivery';

        $user = Auth::User();
        $basic = Basic::where('user_id', $user->id)->first();

        $cartItems = Cart::getContent();

        $totalAmount = 0;
        $shipping = 0;
        if(count($cartItems) > 0) {
            foreach ($cartItems as $item) {
                // Check if the item has an 'offer' attribute
                $offer = isset($item->attributes['offer']) && !empty($item->attributes['offer']) ? $item->attributes['offer'] : null;

                // Calculate the price after applying the offer (if available)
                if ($offer) {
                    // Calculate the discount (assuming 'offer' is a percentage discount)
                    $discountedPrice = $item->price - ($item->price * ($offer / 100));
                } else {
                    // No offer, use the original price
                    $discountedPrice = $item->price;
                }

                // Calculate total for this item (price * quantity)
                $totalAmount += $discountedPrice * $item->quantity;
            }

            $farmer_id = $cartItems->first()->attributes['farmer_id'];
            $farmer = FarmersBasic::where('admin_id', $farmer_id)->first();

            $distance = $this->calculateDistance($basic->latitude, $basic->longitude, $farmer->latitude, $farmer->longitude);
            $shipping = number_format($distance * $basic->payment, 0);
        }

        return view('user.cart.checkout', compact('basic', 'cartItems', 'totalAmount', 'shipping', 'type'));
    }

    private function calculateDistance($lat1, $long1, $lat2, $long2) {
        $earthRadius = 6371; // Earth's radius in kilometers

        // Convert latitude and longitude from degrees to radians
        $lat1 = deg2rad($lat1);
        $long1 = deg2rad($long1);
        $lat2 = deg2rad($lat2);
        $long2 = deg2rad($long2);

        // Calculate the difference between latitudes and longitudes
        $deltaLat = $lat2 - $lat1;
        $deltaLong = $long2 - $long1;

        // Apply Haversine formula
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
            cos($lat1) * cos($lat2) *
            sin($deltaLong / 2) * sin($deltaLong / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        // Calculate the distance
        $distance = $earthRadius * $c;

        return $distance;
    }

    public function place_order(Request $request)
    {
        $user = Auth::User();
        $cartItems = Cart::getContent();

        if($cartItems->count()) {
            $totalAmount = 0;
            $shipping = 0;
            foreach ($cartItems as $item) {
                // Check if the item has an 'offer' attribute
                $offer = isset($item->attributes['offer']) && !empty($item->attributes['offer']) ? $item->attributes['offer'] : null;

                // Calculate the price after applying the offer (if available)
                if ($offer) {
                    // Calculate the discount (assuming 'offer' is a percentage discount)
                    $discountedPrice = $item->price - ($item->price * ($offer / 100));
                } else {
                    // No offer, use the original price
                    $discountedPrice = $item->price;
                }

                // Calculate total for this item (price * quantity)
                $totalAmount += $discountedPrice * $item->quantity;
            }

            $delivery_option = $request->delivery_option;
            if($delivery_option == 'Express Delivery') {
                $shipping = $request->shipping ? $request->shipping : 0;
            }

            $user_order = new UserOrder();
            $user_order->user_id = $user->id;
            $user_order->shipping_payment = $shipping;
            $user_order->delivery_option = $request->delivery_option;
            $user_order->save();

            $payment = $totalAmount + $shipping;
            $this->paypal($payment);
                
        } else {
            return redirect('/user/checkout')->with('error', 'Added product is empty & Place order has been failed.');
        }
    }

    private function paypal($payment) {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));

        $response = Http::disableSsl()
        ->withBasicAuth('AWmWGSLBoFFQS17KjCQT0ZFcQV8wLb5nVHQqCG9Jg2Wsc-tH0g2XGbfc8sLC4q3hy9RO4Djrb_bcjvaS', 'EGzXGP_tMpFH7-hG5N4IQSdojhEPLl4kpo1zaFCrZlBmbmEr6VhaDOfrRxS6tMAHIX3oRzmprI_QHptY')
        ->asForm()
        ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful()) {
            $token = $response['access_token'];
        }

        // $token = "A21AAIuy7RmghC3JYEDZaMn6-ZiBM_rwcjvK00cI6u9IPf2hamuWNmgCtG9L1okDjrukmzzwxehdiV_881xsU_aIk3YZpCWgA";

        $provider->setAccessToken(
            [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => 3600,
            ]
        );

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success'),
                "cancel_url" => route('payment.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => number_format($payment/300, 2, '.', '')
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    header('Location: ' . $link['href']);
                    exit;
                }
            }

            return view('user.cart.cancel');
        } else {
            return view('user.cart.cancel');
        }
    }

    public function show_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));

        $response = Http::disableSsl()
        ->withBasicAuth('AWmWGSLBoFFQS17KjCQT0ZFcQV8wLb5nVHQqCG9Jg2Wsc-tH0g2XGbfc8sLC4q3hy9RO4Djrb_bcjvaS', 'EGzXGP_tMpFH7-hG5N4IQSdojhEPLl4kpo1zaFCrZlBmbmEr6VhaDOfrRxS6tMAHIX3oRzmprI_QHptY')
        ->asForm()
        ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful()) {
            $token = $response['access_token'];
        }

        $provider->setAccessToken(
            [
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_in' => 3600,
            ]
        );

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $user = Auth::User();

            $cartItems = Cart::getContent();
    
            if($cartItems->count()) {
                $totalAmount = 0;
                $shipping = 0;
                foreach ($cartItems as $item) {
                    // Check if the item has an 'offer' attribute
                    $offer = isset($item->attributes['offer']) && !empty($item->attributes['offer']) ? $item->attributes['offer'] : null;
    
                    // Calculate the price after applying the offer (if available)
                    if ($offer) {
                        // Calculate the discount (assuming 'offer' is a percentage discount)
                        $discountedPrice = $item->price - ($item->price * ($offer / 100));
                    } else {
                        // No offer, use the original price
                        $discountedPrice = $item->price;
                    }
    
                    // Calculate total for this item (price * quantity)
                    $totalAmount += $discountedPrice * $item->quantity;
                }

                $user_order = UserOrder::where('user_id', $user->id)->latest()->first();
                $shipping = $user_order->shipping_payment;
                $delivery = $user_order->delivery_option;

                $order = new Order();
                $order->order_reference = Str::random(8);
                $order->user_id = $user->id;
                $order->farmer_id = $cartItems->first()->attributes['farmer_id'];
                $order->delivery_option = $delivery;
                $order->order_placed = true;
                $order->payment_option = 'Credit';
                $order->driver_payment = $shipping;
                $order->total = $totalAmount + $shipping;
                $order->paypal_id = $response['id'];
                $order->paypal_status = $response['status'];
                $order->save();

                foreach ($cartItems as $ci) {
                    $product = new OrderProduct();
                    $product->order_id = $order->id;
                    $product->product_id = $ci->id;
                    $product->quantity = $ci->quantity;
                    $product->save();

                    $product = Product::find($ci->id);
                    $product->stock = $product->stock - $ci->quantity;
                    $product->sold = $product->sold + $ci->quantity;
                    $product->save();

                    if($product->stock < 5) {
                        $farmer = FarmersBasic::where('admin_id' , $product->admin_id)->first();
                        try {
                            Mail::to($farmer->email)->send(new StockStatusMail($product, $farmer));
                        } catch (\Exception $e) {
                            return $e->getMessage();
                        }
                    }
                }

                Cart::clear();
            }

            return view('user.cart.success');
        }

        return view('user.cart.cancel');
    }

    public function show_cancel()
    {
        return view('user.cart.cancel');
    }
}




