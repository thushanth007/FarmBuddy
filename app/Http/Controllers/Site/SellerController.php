<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Category;
use App\Models\FarmersBasic;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\SellerRegisterRequest;
use App\Mail\SellerRegistrationMail;
use Illuminate\Support\Facades\Mail;

class SellerController extends Controller
{

    public function get_seller_register()
    {
        $categories = Category::pluck('title', 'id');

        return view('site.seller.index', compact('categories'));
    }


    public function post_seller_register(SellerRegisterRequest $request) {

        $user = new Admin();
        $user->name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'seller';
        $user->image = 'profile.jpg';
        $user->save();

        $basic = new FarmersBasic();
        $basic->admin_id = $user->id;
        $basic->farm_name = $request->farm_name;
        $basic->first_name = $request->first_name;
        $basic->last_name = $request->last_name;
        $basic->email = $request->email;
        $basic->phone = $request->phone;
        $basic->street = $request->street;
        $basic->city = $request->city;
        $basic->postal_code = $request->postal_code;
        $basic->latitude = $request->latitude;
        $basic->longitude = $request->longitude;
        $basic->category_id = $request->category_id;
        $basic->bank_name = $request->bank_name;
        $basic->bank_account_number = $request->bank_account_number;
        $basic->logo = $request->logo;
        $basic->document = $request->document;
        $basic->save();

        try {
            Mail::to($user->email)->send(new SellerRegistrationMail($user));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect('seller-register')->with('info', 'You have successfully registered. Check it your Email for further instructions.');
    }
}
