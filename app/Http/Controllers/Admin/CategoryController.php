<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware('auth:admin');
    }

    public function index($id = null)
    {
        $categories = $this->category->orderBy('id', 'DESC')->get();

        if($id) {
            $category = $this->category->find($id);
        }else {
            $category = new Category();
        }

        return view('admin.category.index', compact('category', 'categories'));
    }

    public function post_add(CategoryRequest $request)
    {

        $this->category = new Category();

        $this->category->fill($request->all());
        $request->status == 1 ? $this->category->status = 1 : $this->category->status = 0;
        $this->category->save();

        $sessionMsg = $this->category->name;
        return redirect('admin/category')->with('success', 'Category data has been created');
    }

    public function post_edit(CategoryRequest $request, $id)
    {
        $this->category = $this->category->find($id);
        $this->category->fill($request->all());
        $request->status == 1 ? $this->category->status = 1 : $this->category->status = 0;
        $this->category->save();

        $sessionMsg = $this->category->name;
        return redirect('admin/category')->with('success', 'category data has been updated');
    }

    public function get_delete($id)
    {
        $product = Product::where('category_id', $id)->get();

        if(count($product) == 0 ) {
            $this->category->find($id)->delete();
            return redirect('admin/category')->with('success', 'Your data has been deleted successfully.');
        } else {
            return redirect('admin/category')->with('error', 'Your data has not been deleted, Delete your news first.');
        }
    }

}
