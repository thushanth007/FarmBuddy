<?php

#Dashboard
Route::get('/admin', function (){
    return redirect(route('admin.dashboard'));
})->name('home');

Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('dashboard');

Route::get('/farmer-info', 'Admin\HomeController@get_farmer');
Route::get('/farmer-view/{id}', 'Admin\HomeController@get_farmer_view');
Route::get('/farmer-update-payment/{id}', 'Admin\HomeController@get_farmer_update_payment');
Route::get('/driver-info', 'Admin\HomeController@get_driver');
Route::get('/driver-view/{id}', 'Admin\HomeController@get_driver_view');
Route::get('/driver-update-payment/{id}', 'Admin\HomeController@get_driver_update_payment');

#Category
Route::get('category', 'Admin\CategoryController@index');
Route::post('category', 'Admin\CategoryController@post_add');
Route::get('category/{id}/edit', 'Admin\CategoryController@index');
Route::post('category/{id}/edit', 'Admin\CategoryController@post_edit');
Route::get('category/{id}/delete', 'Admin\CategoryCategoryController@get_delete');

#Message
Route::get('contact', 'Admin\ContactController@index');
Route::get('contact/{id}/view', 'Admin\ContactController@get_view');
Route::get('contact/{id}/delete', 'Admin\ContactController@force_delete');

#Profile
Route::get('profile', 'Admin\ProfileController@get_edit');
Route::post('profile', 'Admin\ProfileController@post_edit');

#Setting
Route::get('setting', 'Admin\SettingController@get_edit');
Route::post('setting', 'Admin\SettingController@post_edit');


# Seller
Route::get('seller-dashboard', 'Admin\SellerController@get_seller_dashboard');
Route::get('seller-category', 'Admin\SellerController@get_seller_category');

Route::get('seller-product', 'Admin\SellerProductController@index');
Route::get('seller-product/add', 'Admin\SellerProductController@get_add');
Route::post('seller-product/add', 'Admin\SellerProductController@post_add');
Route::get('seller-product/{id}/edit', 'Admin\SellerProductController@get_edit');
Route::post('seller-product/{id}/edit', 'Admin\SellerProductController@post_edit');
Route::get('seller-product/{id}/view', 'Admin\SellerProductController@get_view');
Route::get('seller-product/{id}/delete', 'Admin\SellerProductController@force_delete');

Route::get('seller-order', 'Admin\SellerController@get_seller_order')->name('seller-order');
Route::get('seller-order/{id}/view', 'Admin\SellerController@get_seller_order_view');
Route::post('seller-order/{id}/confirm', 'Admin\SellerController@update_action');
Route::post('seller-order/{id}/delivered', 'Admin\SellerController@update_delivered');

Route::get('seller-review', 'Admin\SellerController@get_seller_review');
Route::get('seller-review/{id}/view', 'Admin\SellerController@get_seller_review_view');

Route::get('seller-chat', 'Admin\SellerController@get_seller_chat');
Route::get('seller-chat/{id}/view', 'Admin\SellerController@get_seller_chat_view');

Route::get('seller-location', 'Admin\SellerController@get_seller_location');
Route::post('seller-location', 'Admin\SellerController@post_seller_location');

# Driver
Route::get('driver-dashboard', 'Admin\DriverController@get_driver_dashboard');
Route::get('driver-order', 'Admin\DriverController@get_driver_order');
Route::get('driver-order/{id}/view', 'Admin\DriverController@get_order_view');
Route::post('driver-delivery/{id}/picked', 'Admin\DriverController@update_picked');
Route::post('driver-delivery/{id}/delivered', 'Admin\DriverController@update_delivered');
Route::get('driver-history', 'Admin\DriverController@get_driver_history');

Route::get('driver-request/{reference}', 'Admin\DriverController@get_driver_request');
Route::post('driver-accept/{reference}', 'Admin\DriverController@get_driver_accept');

Route::get('driver-location', 'Admin\DriverController@get_driver_location');
Route::post('driver-location', 'Admin\DriverController@post_driver_location');


