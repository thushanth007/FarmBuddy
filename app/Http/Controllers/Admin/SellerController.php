<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Review;
use App\Models\DriverRequest;
use Carbon\Carbon;
use App\Models\FarmersBasic;
use App\Models\DriverBasic;
use App\Models\Basic;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\DriverRequestMail;
use App\Mail\OrderConfirmMail;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function get_seller_dashboard()
    {
        $id = $this->authAdmin()->id;

        // $sales = Order::where('farmer_id', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total');
        $sales = Order::where('farmer_id', $id)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum(DB::raw('total - driver_payment'));
        $order = Order::where('farmer_id', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $product = Product::where('admin_id', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $review = Review::join('product', 'review.product_id', '=', 'product.id')->where('product.admin_id', $id)->whereBetween('review.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $monOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek())
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');
        $tueOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(1))
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');
        $wedOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(2))
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');
        $thuOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(3))
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');
        $friOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(4))
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');
        $satOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(5))
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');
        $sunOrder = Order::where('farmer_id', $id)
            ->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(6))
            ->selectRaw('SUM(total - driver_payment) as total_sales')
            ->value('total_sales');

        // $monOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek())->count();
        // $tueOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(1))->count();
        // $wedOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(2))->count();
        // $thuOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(3))->count();
        // $friOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(4))->count();
        // $satOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(5))->count();
        // $sunOrder = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(6))->count();

        $monSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek())->sum('total');
        $tueSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(1))->sum('total');
        $wedSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(2))->sum('total');
        $thuSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(3))->sum('total');
        $friSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(4))->sum('total');
        $satSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(5))->sum('total');
        $sunSale = Order::where('farmer_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(6))->sum('total');

        $location = FarmersBasic::where('admin_id', $id)->first();

        return view('admin.seller.dashboard', compact(
            'sales',
            'order',
            'product',
            'review',
            'monOrder',
            'tueOrder',
            'wedOrder',
            'thuOrder',
            'friOrder',
            'satOrder',
            'sunOrder',
            'monSale',
            'tueSale',
            'wedSale',
            'thuSale',
            'friSale',
            'satSale',
            'sunSale',
            'location'
        ));
    }

    public function get_seller_category()
    {
        $categories = Category::orderBy('id', 'DESC')->get();

        return view('admin.seller.category', compact('categories'));
    }

    public function get_seller_order()
    {
        $id = $this->authAdmin()->id;
        $data = Order::where('farmer_id', $id)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.seller.order', compact('data'));
    }

    public function get_seller_order_view($id)
    {
        $singleData = Order::find($id);
        $data = OrderProduct::where('order_id', $singleData->id)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.seller.order_view', compact('singleData', 'data'));
    }

    public function update_action($id)
    {
        $order = Order::find($id);
        $order->order_confirmed = 1;
        $order->save();

        if ($order->delivery_option == 'Express Delivery') {
            $farmer = FarmersBasic::where('admin_id', $order->farmer_id)->first();

            $driver = DriverBasic::select(DB::raw("*,
                    ( 6371 * acos( cos( radians($farmer->latitude) )
                    * cos( radians( latitude ) )
                    * cos( radians( longitude ) - radians($farmer->longitude) )
                    + sin( radians($farmer->latitude) )
                    * sin( radians( latitude ) ) ) ) AS distance"))
                ->orderBy('distance', 'asc')
                ->limit(3)
                ->get();

            foreach ($driver as $dr) {
                // Driver request
                $request = new DriverRequest();
                $request->driver_reference = Str::random(8);
                $request->order_id = $order->id;
                $request->driver_id = $dr->admin_id;
                $request->save();


                try {
                    Mail::to($dr->email)->send(new DriverRequestMail($request, $dr, $farmer));
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }

            return redirect()->back()->with('success', 'Driver request has been sent');
        } else {
            $basic = Basic::where('id', $order->user_id)->first();
            try {
                Mail::to($basic->email)->send(new OrderConfirmMail($order, $basic));
            } catch (\Exception $e) {
                return $e->getMessage();
            }

            return redirect()->back()->with('success', 'Order status has been updated');
        }
    }

    public function update_delivered($id)
    {
        $order = Order::find($id);
        $order->delivered = 1;
        $order->save();

        return redirect()->back()->with('success', 'Order status has been updated');
    }

    public function get_seller_review()
    {
        $id = $this->authAdmin()->id;
        $data = Review::join('product', 'review.product_id', '=', 'product.id')->where('product.admin_id', $id)->paginate(10);

        return view('admin.seller.review', compact('data'));
    }

    public function get_seller_location()
    {
        return view('admin.seller.location');
    }

    public function post_seller_location(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $id = $this->authAdmin()->id;
        $farmer = FarmersBasic::where('admin_id', $id)->first();
        $farmer->latitude = $request->latitude;
        $farmer->longitude = $request->longitude;
        $farmer->save();

        \Log::info('Updated location:', ['admin_id' => $id, 'latitude' => $farmer->latitude, 'longitude' => $farmer->longitude]);

        return redirect()->back()->with('success', 'Farmer location has been updated');
    }
}
