<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Authenticatesusers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    use Authenticatesusers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // Logic for the main admin dashboard (Master Admin)
        return view('admin.dashboard'); // Make sure this view exists
    }

    /**
     * Seller dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sellerDashboard()
    {
        // Logic for the seller's dashboard
        return view('admin.seller-dashboard'); // Make sure this view exists
    }

    /**
     * Driver dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function driverDashboard()
    {
        // Logic for the driver's dashboard
        return view('admin.driver-dashboard'); // Make sure this view exists
    }

    public function showLoginForm()
    {
        // If an admin is already logged in, redirect them to their respective dashboard
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();

            // Redirect based on the user_type
            if ($user->user_type == 'seller') {
                return redirect('/admin/seller-dashboard');
            } elseif ($user->user_type == 'driver') {
                return redirect('/admin/driver-dashboard');
            } else {
                return redirect('/admin/dashboard'); // Default admin dashboard
            }
        }

        // If a user is logged in as a regular user, log them out
        // if (Auth::guard('web')->check()) {
        //     Auth::guard('web')->logout();
        //     session()->invalidate();  // Invalidate user session
        //     session()->regenerateToken();  // Regenerate CSRF token
        // }

        // Show the admin login form to guests
        return view('auth.admin-login');
    }

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout(); // Log out the admin user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token for security

        // Redirect to admin login page after logout
        return redirect('/admin/login');
    }
}
