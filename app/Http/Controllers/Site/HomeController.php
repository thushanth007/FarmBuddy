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
        $categories = Category::where('status', 1)->with([
            'products' => function ($query) {
                $query->where('is_status', 1)
                    ->orderBy('id', 'DESC')
                    ->limit(10)
                    ->select('id', 'name', 'price', 'unit', 'image_1', 'category_id', 'offer')
                    ->withAvg('review', 'rating');
            }
        ])->get();

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

        return view('site.home.index', compact('top_selling', 'trending', 'recently', 'new', 'categories'));
    }
}
