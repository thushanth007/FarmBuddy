
<?php

Auth::routes();

#Site
Route::get('/', 'Site\HomeController@index');

#Contact Us
Route::get('/contact-us', 'Site\ContactController@get_contact');
Route::post('/contact', 'Site\ContactController@post_contact');

#Account User
Route::get('/user-login', 'Site\AccountController@get_login')->name('user-login');

Route::get('/user-register', 'Site\AccountController@get_user_register');
Route::post('/user-register', 'Site\AccountController@post_user_register');

# User logout
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');  // This handles regular user logout

# Seller
Route::get('/seller-register', 'Site\SellerController@get_seller_register');
Route::post('/seller-register', 'Site\SellerController@post_seller_register');

# Driver
Route::get('/driver-register', 'Site\DriverController@get_driver_register');
Route::post('/driver-register', 'Site\DriverController@post_driver_register');

# Product
Route::get('product/shop', 'Site\ProductController@get_shop');
Route::get('product/shop/{id}/view', 'Site\ProductController@get_shop_view');
Route::get('product/{id}/view', 'Site\ProductController@get_view');
Route::post('product/{id}/review', 'Site\ProductController@post_review');

Route::get('product/{id}/category', 'Site\ProductController@get_category');
Route::post('product/search', 'Site\ProductController@get_search');
Route::post('product/filter', 'Site\ProductController@get_filter');

# Cart
Route::get('cart', 'Site\CartController@showCart');
Route::post('cart/add/{id}', 'Site\CartController@addToCart');
Route::post('cart/update/{rowId}', 'Site\CartController@updateCart');
Route::get('cart/remove/{rowId}', 'Site\CartController@removeCartItem');

# Wish List
Route::get('wishlist','Site\CartController@showWishlist');
Route::get('wishlist/add/{id}', 'Site\CartController@addToWishlist');
Route::get('wishlist/remove/{id}', 'Site\CartController@removeWishlistItem');

#Admin-Login
// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
//     Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
// });



# Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('/seller-dashboard', 'Admin\AdminController@sellerDashboard')->name('seller.dashboard');
    Route::get('/driver-dashboard', 'Admin\AdminController@driverDashboard')->name('driver.dashboard');
});

# Admin login/logout routes (don't require authentication middleware)
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
});

