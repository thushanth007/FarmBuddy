<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request, $id)
    {
        // $qty = $request->qty;
        // $product = Product::find($id);

        // $request->validate([
        //     'qty' => ['required', 'numeric', 'min:1', 'max:' . $product->stock],
        // ]);

        // Cart::add($product->id, $product->name, $product->price, $qty,  ['unit' => $product->unit, 'image' => $product->image_1, 'offer' => $product->offer, 'farmer_id' => $product->admin_id]);

        // return redirect()->back()->with('success', 'Product added to cart!');
        $qty = $request->qty;
        $product = Product::find($id);

        $request->validate([
            'qty' => ['required', 'numeric', 'min:1', 'max:' . $product->stock],
        ]);

        // Check if there are items in the cart
        $cartItems = Cart::getContent();

        // If the cart is not empty, check if all items are from the same farm
        if ($cartItems->count() > 0) {
            // Get the farmer_id of the first item in the cart
            $firstItem = $cartItems->first();
            $firstItemFarmerId = $firstItem->attributes['farmer_id'];

            // Compare with the current product's farmer_id
            if ($firstItemFarmerId != $product->admin_id) {
                // If different, return an error message and don't add the product to the cart
                return redirect()->back()->with('error', 'You can only add products from one farm at a time.');
            }
        }

        // If all checks pass, add the product to the cart
        Cart::add($product->id, $product->name, $product->price, $qty,  [
            'unit' => $product->unit,
            'image' => $product->image_1,
            'offer' => $product->offer,
            'farmer_id' => $product->admin_id
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // View the cart
    public function showCart()
    {
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

        return view('site.cart.show', compact('cartItems', 'totalAmount'));
    }

    // Update cart item
    public function updateCart(Request $request, $id)
    {
        $item = Cart::get($id);
        $qty = $request->qty - $item->quantity;

        $product = Product::find($item->id);
        $request->validate([
            'qty' => ['required', 'numeric', 'min:1', 'max:' . $product->stock],
        ]);

        if ($item->quantity > 0) {
            Cart::update($id, ['quantity' => $qty]);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove cart item
    public function removeCartItem($id)
    {
        Cart::remove($id);

        return redirect()->back()->with('success', 'Item removed!');
    }

    // Add product to wishlist
    public function addToWishlist(Request $request, $id)
    {
        $product = Product::find($id);

        // Adding product to the 'wishlist' instance of the cart
        Cart::session('wishlist')->add($product->id, $product->name, $product->price, 1, ['unit' => $product->unit, 'image' => $product->image_1, 'offer' => $product->offer]);

        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }

    // Show wishlist
    public function showWishlist()
    {
        $wishlist = Cart::session('wishlist')->getContent();

        return view('site.cart.wishlist', compact('wishlist'));
    }

    // Remove item from wishlist
    public function removeWishlistItem(Request $request, $rowId)
    {
        Cart::session('wishlist')->remove($rowId);

        return redirect()->back()->with('success', 'Item removed from wishlist!');
    }
}
