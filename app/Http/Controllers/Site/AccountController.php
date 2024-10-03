<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Basic;

use App\Http\Requests\Site\RegisterRequest;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function get_login()
    {
        if(Auth::check()) {
            return redirect('user/dashboard');
        }

        return view('site.account.user-login');
    }

    // User Register
    public function get_user_register()
    {
        if(Auth::check()) {
            return redirect('user/dashboard');
        }

        return view('site.account.user-register');
    }


    public function post_user_register(RegisterRequest $request) {

        $user = new User();
        $user->name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $basic = new Basic();
        $basic->user_id = $user->id;
        $basic->first_name = $request->first_name;
        $basic->last_name = $request->last_name;
        $basic->email = $request->email;
        $basic->phone = $request->phone;
        $basic->street = $request->street;
        $basic->city = $request->city;
        $basic->postal_code = $request->postal_code;
        $basic->latitude = $request->latitude;
        $basic->longitude = $request->longitude;
        $basic->payment = 100;
        $basic->save();

        try {
            Mail::to($user->email)->send(new RegistrationMail($user));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect('user-login')->with('info', 'You have successfully registered');
    }
}
