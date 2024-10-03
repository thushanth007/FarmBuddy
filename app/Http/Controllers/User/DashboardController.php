<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Basic;
use App\Models\Order;
use App\Models\User;
use App\Http\Requests\User\UserEditRequest;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\OrderProduct;

class DashboardController extends Controller
{

    public function get_dashboard()
    {
        $user = Auth::user();
        $basic = Basic::where('user_id',  $user->id)->first();
        $total_order = Order::where('user_id',  $user->id)->count();
        $total_pending_order = Order::where('delivered',  0)->where('user_id',  $user->id)->count();
        $total_wish_list = Cart::session('wishlist')->getTotalQuantity();
        $wishlist = Cart::session('wishlist')->getContent();

        $orderProducts = OrderProduct::select('product.*', 'order.order_reference', 'order.delivered as delivered', 'order_product.quantity as quantity', 'order.created_at as created_at', 'order.order_placed', 'order.order_confirmed', 'order.driver_picked_up', 'order.driver_picked_up')
                        ->leftJoin('order', 'order_product.order_id', '=', 'order.id')
                        ->leftJoin('users', 'order.user_id', '=', 'users.id')
                        ->leftJoin('product', 'order_product.product_id', '=', 'product.id')
                        ->where('order.user_id', $user->id)
                        ->get();

        $location = Basic::where('user_id', $user->id)->first();

        return view('user.dashboard.index', compact('basic', 'total_order', 'total_pending_order', 'total_wish_list', 'wishlist', 'orderProducts', 'location'));
    }

    public function update_profile(UserEditRequest $request)
    {
        $id = Auth::user()->id;

        $user = User::find($id);
        $user->name = $request->last_name;
        $user->email = $request->email;
        $user->save();

        $basic = Basic::where('user_id', $id)->first();
        $basic->fill($request->all());
        $basic->save();

        return redirect()->back()->with('success', 'Data has been updated');
    }

    // Remove item from wishlist
    public function removeWishlistItem(Request $request, $rowId)
    {
        Cart::session('wishlist')->remove($rowId);

        return redirect()->back()->with('success', 'Item removed from wishlist!');
    }
}
