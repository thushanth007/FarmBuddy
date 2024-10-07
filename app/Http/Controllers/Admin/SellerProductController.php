<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductEditRequest;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Image;

class SellerProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Product::where('admin_id', $this->authAdmin()->id) // Filter by logged-in seller
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('admin.product.index', compact('data'));
    }

    public function get_add()
    {
        $singleData = new Product();
        $categories = Category::pluck('title', 'id');

        return view('admin.product.add_edit', compact('singleData', 'categories'));
    }

    public function post_add(ProductRequest $request)
    {
        $photo1 = $request->image_1;
        $photo2 = $request->image_2;
        $photo3 = $request->image_3;
        $photo4 = $request->image_4;

        $original_path = storage_path('app/public/product');

        if (!File::exists($original_path)){
            File::makeDirectory($original_path, 0755, true);
        }

        if(!empty($photo1)){
            $ofilename1 = $photo1->getClientOriginalName();
            $file_ext1 = $photo1->getClientOriginalExtension();
            $filename1 = md5($ofilename1 . microtime()) . '.' . $file_ext1;

            $logo1 = Image::make($photo1);

            $logo1->save($original_path.'/'.$filename1);
        }

        if(!empty($photo2)){
            $ofilename2 = $photo2->getClientOriginalName();
            $file_ext2 = $photo2->getClientOriginalExtension();
            $filename2 = md5($ofilename2 . microtime()) . '.' . $file_ext2;

            $logo2 = Image::make($photo2);

            $logo2->save($original_path.'/'.$filename2);
        }

        if(!empty($photo3)){
            $ofilename3 = $photo3->getClientOriginalName();
            $file_ext3 = $photo3->getClientOriginalExtension();
            $filename3 = md5($ofilename3 . microtime()) . '.' . $file_ext3;

            $logo3 = Image::make($photo3);

            $logo3->save($original_path.'/'.$filename3);
        }

        if(!empty($photo4)){
            $ofilename4 = $photo4->getClientOriginalName();
            $file_ext4 = $photo4->getClientOriginalExtension();
            $filename4 = md5($ofilename4 . microtime()) . '.' . $file_ext4;

            $logo4 = Image::make($photo4);

            $logo4->save($original_path.'/'.$filename4);
        }

        $product = new Product();
        $product->fill($request->all());
        $product->admin_id = $this->authAdmin()->id;
        $product->image_1 = !empty($filename1) ? $filename1 : null;
        $product->image_2 = !empty($filename2) ? $filename2 : null;
        $product->image_3 = !empty($filename3) ? $filename3 : null;
        $product->image_4 = !empty($filename4) ? $filename4 : null;
        $request->is_status == 1 ? $product->is_status = 1 : $product->is_status = 0;
        $product->save();

        $dataId = $product->id;

        return redirect('admin/seller-product/'.$dataId.'/view')->with('success', 'Data has been created');
    }

    public function get_edit($id)
    {
        $singleData = Product::find($id);
        $categories = Category::pluck('title', 'id');

        return view('admin.product.add_edit', compact('singleData', 'categories'));
    }

    public function post_edit(ProductEditRequest $request, $id)
    {
        $photo1 = $request->image_1;
        $photo2 = $request->image_2;
        $photo3 = $request->image_3;
        $photo4 = $request->image_4;

        $original_path = storage_path('app/public/product');

        if (!File::exists($original_path)){
            File::makeDirectory($original_path, 0755, true);
        }

        if(!empty($photo1)){
            $ofilename1 = $photo1->getClientOriginalName();
            $file_ext1 = $photo1->getClientOriginalExtension();
            $filename1 = md5($ofilename1 . microtime()) . '.' . $file_ext1;

            $logo1 = Image::make($photo1);

            $logo1->save($original_path.'/'.$filename1);
        }

        if(!empty($photo2)){
            $ofilename2 = $photo2->getClientOriginalName();
            $file_ext2 = $photo2->getClientOriginalExtension();
            $filename2 = md5($ofilename2 . microtime()) . '.' . $file_ext2;

            $logo2 = Image::make($photo2);

            $logo2->save($original_path.'/'.$filename2);
        }

        if(!empty($photo3)){
            $ofilename3 = $photo3->getClientOriginalName();
            $file_ext3 = $photo3->getClientOriginalExtension();
            $filename3 = md5($ofilename3 . microtime()) . '.' . $file_ext3;

            $logo3 = Image::make($photo3);

            $logo3->save($original_path.'/'.$filename3);
        }

        if(!empty($photo4)){
            $ofilename4 = $photo4->getClientOriginalName();
            $file_ext4 = $photo4->getClientOriginalExtension();
            $filename4 = md5($ofilename4 . microtime()) . '.' . $file_ext4;

            $logo4 = Image::make($photo4);

            $logo4->save($original_path.'/'.$filename4);
        }

        $product = Product::find($id);
        $product->fill($request->all());
        if (!empty($filename1)) {$product->image_1 = $filename1;}
        if (!empty($filename2)) {$product->image_2 = $filename2;}
        if (!empty($filename3)) {$product->image_3 = $filename3;}
        if (!empty($filename4)) {$product->image_4 = $filename4;}
        $request->is_status == 1 ? $product->is_status = 1 : $product->is_status = 0;
        $product->save();

        return redirect('admin/seller-product/'.$id.'/view')->with('success', 'Data has been updated');
    }

    public function get_view($id)
    {
        $singleData = Product::find($id);

        return view('admin.product.view',compact('singleData'));
    }

    public function force_delete($id)
    {
        $product = Product::find($id);

        if($product->delete()) {
            return redirect()->back()->with('success', 'Your data has been deleted');
        }else {
            return redirect()->back()->with('error', 'Your data has not been deleted.');
        }
    }

}

