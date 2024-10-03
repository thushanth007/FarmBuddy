<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\DriverBasic;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Site\DriverRegisterRequest;
use App\Mail\DriverRegistrationMail;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller
{

    public function get_driver_register()
    {
        return view('site.driver.index');
    }


    public function post_driver_register(DriverRegisterRequest $request) {

        $user = new Admin();
        $user->name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'driver';
        $user->image = 'profile.jpg';
        $user->save();

        $basic = new DriverBasic();
        $basic->admin_id = $user->id;

        $basic->first_name = $request->first_name;
        $basic->last_name = $request->last_name;
        $basic->email = $request->email;
        $basic->phone = $request->phone;
        $basic->street = $request->street;
        $basic->city = $request->city;
        $basic->postal_code = $request->postal_code;
        $basic->latitude = $request->latitude;
        $basic->longitude = $request->longitude;

        $basic->license = $request->license;
        $basic->vehicle_type = $request->vehicle_type;
        $basic->model = $request->model;
        $basic->registration_number = $request->registration_number;

        $basic->bank_name = $request->bank_name;
        $basic->bank_account_number = $request->bank_account_number;

        $basic->image = $request->image;
        $basic->save();

        try {
            Mail::to($user->email)->send(new DriverRegistrationMail($user));
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect('driver-register')->with('info', 'You have successfully registered. Check it your Email for further instructions.');
    }
}
