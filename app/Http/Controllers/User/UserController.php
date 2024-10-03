<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Basic;

class UserController extends Controller
{
    public function post_user_location(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $id = Auth::user()->id;
        $basic = Basic::where('user_id', $id)->firstOrFail();
        $basic->latitude = $request->latitude;
        $basic->longitude = $request->longitude;
        $basic->save();

        \Log::info('Updated location:', ['user_id' => $id, 'latitude' => $basic->latitude, 'longitude' => $basic->longitude]);

        return redirect()->back()->with('success', 'Driver location has been updated');
    }
}
