<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

#User
Route::get('user/dashboard', 'User\DashboardController@get_dashboard')->name('user.dashboard');;
Route::post('user/update', 'User\DashboardController@update_profile');

# Checkout
Route::get('user/checkout', 'User\CartController@showCheckout');
Route::post('user/order', 'User\CartController@place_order');
Route::get('user/payment-sucess', 'User\CartController@show_success')->name('payment.success');
Route::get('user/payment-cancel', 'User\CartController@show_cancel')->name('payment.cancel');

# Wish List
Route::get('wishlist/remove/{id}', 'User\DashboardController@removeWishlistItem');

Route::post('user-location', 'User\UserController@post_user_location');
