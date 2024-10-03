<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use Carbon\Carbon;
use App\Models\OrderProduct;
use App\Models\Basic;
use App\Models\FarmersBasic;
use App\Models\DriverBasic;
use App\Models\DriverRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\DriverAcceptMail;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function get_driver_dashboard()
    {
        $id = $this->authAdmin()->id;

        $sales = Order::where('driver_id', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('driver_payment');
        $order = Order::where('driver_id', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $pending = Order::where('driver_id', $id)->where('delivered', 0)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $complete = Order::where('driver_id', $id)->where('delivered', 1)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        $monOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek())->count();
        $tueOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(1))->count();
        $wedOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(2))->count();
        $thuOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(3))->count();
        $friOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(4))->count();
        $satOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(5))->count();
        $sunOrder = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(6))->count();

        $monSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek())->sum('driver_payment');
        $tueSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(1))->sum('driver_payment');
        $wedSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(2))->sum('driver_payment');
        $thuSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(3))->sum('driver_payment');
        $friSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(4))->sum('driver_payment');
        $satSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(5))->sum('driver_payment');
        $sunSale = Order::where('driver_id', $id)->whereDate('created_at', Carbon::now()->startOfWeek()->addDay(6))->sum('driver_payment');

        $location = DriverBasic::where('admin_id', $id)->first();

        return view('admin.driver.dashboard', compact('sales', 'order', 'pending', 'complete',
            'monOrder', 'tueOrder', 'wedOrder', 'thuOrder', 'friOrder', 'satOrder', 'sunOrder',
            'monSale', 'tueSale', 'wedSale', 'thuSale', 'friSale', 'satSale', 'sunSale', 'location'));
    }

    public function get_driver_order()
    {
        $id = $this->authAdmin()->id;
        $data = Order::where('driver_id', $id)->where('delivery_option', 'Express Delivery')->where('delivered', 0)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.driver.order', compact('data'));
    }

    public function get_order_view($id)
    {
        $singleData = Order::find($id);
        $data = OrderProduct::where('order_id', $singleData->id)->orderBy('id', 'DESC')->paginate(10);
        $user = Basic::where('user_id', $singleData->user_id)->first();
        $farmer = FarmersBasic::where('admin_id', $singleData->farmer_id)->first();

        return view('admin.driver.order_view', compact('singleData', 'data', 'user', 'farmer'));
    }

    public function update_picked($id)
    {
        $order = Order::find($id);
        $order->driver_picked_up = 1;
        $order->save();

        return redirect()->back()->with('success', 'Order status has been updated');
    }
    
    public function update_delivered($id)
    {
        $order = Order::find($id);
        $order->delivered = 1;
        $order->save();

        return redirect()->back()->with('success', 'Order status has been updated');
    }

    public function get_driver_history()
    {
        $id = $this->authAdmin()->id;
        $data = Order::where('driver_id', $id)->where('delivery_option', 'Express Delivery')->where('delivered', 1)->orderBy('id', 'DESC')->paginate(10);

        return view('admin.driver.history', compact('data'));
    }

    public function get_driver_request($reference)
    {
        $id = $this->authAdmin()->id;
        $request = DriverRequest::where('driver_reference', $reference)->first();
        $verification = DriverRequest::where('order_id', $request->order_id)->where('is_status' , 1)->count('id');

        if($id == $request->driver_id && $verification == 0) {
            $singleData = Order::find($request->order_id);
            $data = OrderProduct::where('order_id', $singleData->id)->orderBy('id', 'DESC')->paginate(10);
            $user = Basic::where('user_id', $singleData->user_id)->first();
            $farmer = FarmersBasic::where('admin_id', $singleData->farmer_id)->first();

            return view('admin.driver.order_status', compact('singleData', 'data', 'user', 'farmer', 'request', 'verification'));
        } else {
            return redirect('admin/driver-order')->with('error', 'Sorry! Someone has already accepted this request');
        }
    }


    public function get_driver_accept($reference)
    {
        $request = DriverRequest::where('driver_reference', $reference)->where('is_status' , 0)->first();
        if(!$request) {
            return redirect('admin/driver-order')->with('error', 'Sorry! Request not found');
        }

        $verification = DriverRequest::where('order_id', $request->order_id)->where('is_status' , 1)->first();
        if(!$verification) {
            $request->is_status = 1;
            $request->save();

            $order = Order::find($request->order_id);
            $order->driver_id = $request->driver_id;
            $order->save();

            $farmer = FarmersBasic::where('admin_id', $order->farmer_id)->first();
            $driver = DriverBasic::where('admin_id', $order->driver_id)->first();

            try {
                Mail::to($farmer->email)->send(new DriverAcceptMail($driver, $farmer, $order));
            } catch (\Exception $e) {
                return $e->getMessage();
            }
    
            return redirect('admin/driver-order/'.$request->order_id.'/view')->with('success', 'Order status has been updated');
        }
        return redirect('admin/driver-order')->with('error', 'Sorry! Someone has already accepted this request');
    }

    public function get_driver_location()
    {
        return view('admin.driver.location');
    }

    public function post_driver_location(Request $request)
    {
        $id = $this->authAdmin()->id;
        $driver = DriverBasic::where('admin_id', $id)->first();
        $driver->latitude = $request->latitude;
        $driver->longitude = $request->longitude;
        $driver->save();

        return redirect()->back()->with('success', 'Driver location has been updated');
    }
}
