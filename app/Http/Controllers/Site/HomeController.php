<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $category = Category::where('status', 1)->orderBy('id', 'ASC')->limit(10)->get();

        $product_1 = Product::where('category_id', 1)
                ->where('is_status', 1)
                ->orderBy('id', 'DESC')
                ->limit(10)
                ->select('id', 'name', 'price', 'unit', 'image_1', 'category_id', 'offer')
                ->withAvg('review', 'rating')
                ->get();

        $product_2 = Product::where('category_id', 1)
                ->where('is_status', 2)
                ->orderBy('id', 'DESC')
                ->limit(10)
                ->select('id', 'name', 'price', 'unit', 'image_1', 'category_id', 'offer')
                ->withAvg('review', 'rating')
                ->get();

        $product_3 = Product::where('category_id', 1)
                ->where('is_status', 3)
                ->orderBy('id', 'DESC')
                ->limit(10)
                ->select('id', 'name', 'price', 'unit', 'image_1', 'category_id', 'offer')
                ->withAvg('review', 'rating')
                ->get();

        $product_4 = Product::where('category_id', 1)
                ->where('is_status', 4)
                ->orderBy('id', 'DESC')
                ->limit(10)
                ->select('id', 'name', 'price', 'unit', 'image_1', 'category_id', 'offer')
                ->withAvg('review', 'rating')
                ->get();

        $top_selling = Product::where('is_status', 1)
                ->orderBy('sold', 'DESC')
                ->limit(4)
                ->select('id', 'name', 'price', 'image_1', 'offer')
                ->withAvg('review', 'rating')
                ->get();
                
        $trending = Product::where('section', 'Trending')
                ->where('is_status', 1)->orderBy('id', 'DESC')
                ->limit(4)->select('id', 'name', 'price', 'image_1', 'offer')
                ->withAvg('review', 'rating')
                ->get();

        $recently = Product::where('is_status', 1)
                ->orderBy('created_at', 'DESC')->limit(4)
                ->select('id', 'name', 'price', 'image_1', 'offer')
                ->withAvg('review', 'rating')->get();

        $new = Product::where('section', 'New')
                ->where('is_status', 1)
                ->orderBy('id', 'DESC')
                ->limit(4)
                ->select('id', 'name', 'price', 'image_1', 'offer')
                ->withAvg('review', 'rating')
                ->get();

        return view('site.home.index', compact('category', 'product_1', 'product_2', 'product_3', 'product_4', 'top_selling', 'trending', 'recently', 'new'));
    }
}
