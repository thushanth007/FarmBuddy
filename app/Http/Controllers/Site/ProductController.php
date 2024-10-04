<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmersBasic;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use DB;

class ProductController extends Controller
{
    public function get_shop(Request $request) {

        $farms = FarmersBasic::select('farmers_basic.*', DB::raw('COALESCE(AVG(review.rating), 0) as average_rating'), DB::raw('COUNT(DISTINCT product.id) as product_count'))
                ->leftJoin('product', 'farmers_basic.admin_id', '=', 'product.admin_id')
                ->leftJoin('review', 'product.id', '=', 'review.product_id')
                ->groupBy('farmers_basic.id')
                ->orderBy('farmers_basic.id', 'ASC')
                ->limit(30)
                ->paginate(1);

        return view('site.shop.index', compact('farms'));
    }

    public function get_shop_view(Request $request, $id) {

        $farmer = FarmersBasic::find($id);
        $related = Product::where('admin_id', $farmer->admin_id)
            ->where('is_status', 1)
            ->orderBy('id', 'DESC')
            ->limit(12)
            ->select('id', 'name', 'price', 'unit', 'offer', 'image_1')
            ->with('review')
            ->withAvg('review', 'rating')
            ->get();

        $averageRatingFarm = Review::leftJoin('product', 'review.product_id', '=', 'product.id')
            ->where('product.admin_id', $farmer->admin_id)
            ->avg('rating');

        return view('site.shop.house', compact('farmer', 'related', 'averageRatingFarm'));
    }

    public function get_view(Request $request, $id) {

        $product = Product::find($id);
        $farm = FarmersBasic::where('admin_id', $product->admin_id)->first();
        $trending = Product::where('section', 'Trending')
                ->where('is_status', 1)
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->select('id', 'name', 'price', 'unit', 'offer', 'image_1')
                ->get();

        $related = Product::where('admin_id', $product->admin_id)
                ->where('is_status', 1)
                ->orderBy('id', 'DESC')
                ->limit(12)
                ->select('id', 'name', 'price', 'unit', 'offer', 'image_1')
                ->with('review')
                ->withAvg('review', 'rating')
                ->get();

        $review = Review::where('product_id', $id)->orderBy('id', 'DESC')->get();

        $averageRating = Review::where('product_id', $id)->avg('rating');
        $averageRating = number_format($averageRating, 0);
        $rating1 = Review::where('product_id', $id)->where('rating', 1)->count();
        $rating2 = Review::where('product_id', $id)->where('rating', 2)->count();
        $rating3 = Review::where('product_id', $id)->where('rating', 3)->count();
        $rating4 = Review::where('product_id', $id)->where('rating', 4)->count();
        $rating5 = Review::where('product_id', $id)->where('rating', 5)->count();
        $total = Review::where('product_id', $id)->count();

        $averageRatingFarm = Review::leftJoin('product', 'review.product_id', '=', 'product.id')
                ->where('product.admin_id', $farm->admin_id)
                ->avg('rating');

        $countRatingFarm = Review::leftJoin('product', 'review.product_id', '=', 'product.id')
                ->where('product.admin_id', $farm->admin_id)
                ->count();


        return view('site.product.view', compact('product', 'farm', 'trending', 'related', 'review', 'averageRating',
                    'rating1', 'rating2', 'rating3', 'rating4', 'rating5', 'total', 'averageRatingFarm', 'countRatingFarm'));
    }

    public function get_category(Request $request, $id) {

        $category = Category::find($id);
        $title = $category->title;
        $category = Category::where('status', 1)->get();
        $products = Product::where('category_id', $id)
                    ->where('is_status', 1)
                    ->orderBy('id', 'DESC')
                    ->select('id', 'name', 'price', 'unit', 'offer', 'image_1')
                    ->get();

        return view('site.product.index', compact('title', 'products', 'category'));
    }

    public function get_search(Request $request) {

        $name = $request->name;
        $title = 'Search: ' . $name;
        $category = Category::where('status', 1)->get();
        $products = Product::where('name', 'like', '%' . $name . '%')
                ->where('is_status', 1)
                ->orderBy('id', 'DESC')
                ->select('id', 'name', 'price', 'unit', 'offer', 'image_1')
                ->with('review')
                ->withAvg('review', 'rating')
                ->get();

        return view('site.product.index', compact('products', 'title', 'category'));
    }

    public function get_filter(Request $request) {

        $title = 'Filter';
        $category = Category::where('status', 1)->get();
        $products = [];

        $selectedCategoryIds = $request->input('category');
        $selectedOffers = $request->input('selectedOffers');

        $products = Product::where('is_status', 1)
                ->when(!empty($selectedCategoryIds), function ($query) use ($selectedCategoryIds) {
                    return $query->whereIn('category_id', $selectedCategoryIds);
                })
                ->when(!empty($selectedOffers), function ($query) use ($selectedOffers) {
                    foreach ($selectedOffers as $offer) {
                        $query->where('offer', '<', $offer);
                    }
                    return $query;
                })
                ->orderBy('id', 'DESC')
                ->select('id', 'name', 'price', 'unit', 'offer', 'image_1')
                ->get();

        return view('site.product.index', compact('products', 'title', 'category'));
    }

    public function post_review(Request $request, $id) {

        if(!Auth::user()) {
            return redirect('user-login');
        }

        $review = new Review();
        $review->fill($request->all());
        $review->product_id = $id;
        $review->user_id = Auth::user()->id;
        $review->save();

        return redirect()->back()->with('success', 'Data has been updated');
    }
}
