<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\ContactUs;
use App\Models\FarmersBasic;
use App\Models\DriverBasic;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        if($this->authAdmin()->user_type == 'seller') {
            return redirect('admin/seller-dashboard');
        } elseif($this->authAdmin()->user_type == 'driver') {
            return redirect('admin/driver-dashboard');
        }

        $order = Order::count();
        $users = User::count();
        $farmer = Admin::where('user_type', 'seller')->count();
        $driver = Admin::where('user_type', 'driver')->count();
        $category = Category::count();
        $products = Product::count();
        $review = Review::count();
        $contact = ContactUs::count();

        return view('admin.home.index', compact('order', 'users', 'farmer', 'driver','category', 'products', 'review', 'contact'));
    }

    public function get_farmer()
    {
        $farmer = FarmersBasic::select('farmers_basic.*', DB::raw('SUM(order.total) as total_amount'), DB::raw('SUM(order.driver_payment) as driver_payment'))
            ->leftJoin('order', 'farmers_basic.admin_id', '=', 'order.farmer_id')
            // ->where('order.delivered', 1)
            ->groupBy('farmers_basic.admin_id')
            ->paginate(10);

        return view('admin.home.farmer', compact('farmer'));
    }

    public function get_farmer_view($id)
    {
        $singleData = FarmersBasic::find($id);
        $data = Order::where('farmer_id', $singleData->admin_id)->paginate(10);

        return view('admin.home.farmer_view', compact('singleData', 'data'));
    }

    public function get_farmer_update_payment($id)
    {
        $order = Order::find($id);
        $order->farmer_payment_status = 1;
        $order->save();

        return redirect()->back()->with('success', 'Data has been updated');
    }

    public function get_driver()
    {
        $driver = DriverBasic::select('driver_basic.*', DB::raw('SUM(order.driver_payment) as driver_payment'))
            ->leftJoin('order', 'driver_basic.admin_id', '=', 'order.driver_id')
            // ->where('order.delivered', 1)
            ->groupBy('driver_basic.admin_id')
            ->paginate(10);

        return view('admin.home.driver', compact('driver'));
    }

    public function get_driver_view($id)
    {
        $singleData = DriverBasic::find($id);
        $data = Order::where('driver_id', $singleData->admin_id)->paginate(10);

        return view('admin.home.driver_view', compact('singleData', 'data'));
    }

    public function get_driver_update_payment($id)
    {
        $order = Order::find($id);
        $order->driver_payment_status = 1;
        $order->save();

        return redirect()->back()->with('success', 'Data has been updated');
    }

}
