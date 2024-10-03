<?php namespace App\Http\ViewComposers;

use App\Models\Setting;
use App\Models\Category;
use App\Models\FarmersBasic;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class HeaderComposer extends Controller {

    public function __construct() {}

    public function option(View $view) {

        $option = Setting::where('status', 1)->first();
        $category = Category::where('status', 1)->orderBy('id', 'ASC')->limit(10)->get();
        $cartItems = Cart::getContent();

        $totalAmount = 0;
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

        $view->with('option', $option);
        $view->with('category', $category);
        $view->with('cartItems', $cartItems);
        $view->with('totalAmount', $totalAmount);
    }
}

