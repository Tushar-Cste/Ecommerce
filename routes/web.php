<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//test or debug 

Route::get('/test', function(){
 	$user = Auth::user();
 	var_dump($user);
 	exit();
});


//frontend routes.................

//routes to show home page 
Route::get('/', 'homeController@index');
Route::get('/productsByCategory/{category_id}','homeController@productsByCategory');
Route::get('/productsByManufacture/{manufacture_id}','homeController@productsByManufacture');
Route::get('/productDetails/{product_id}','homeController@productDetails');

//Route for Cart

Route::post('/addToCart/{product_id}','CartController@addToCart');
Route::get('/showCart','CartController@showCart');
Route::get('/deleteFromCart/{row_id}','CartController@deleteFromCart');
Route::post('/updateCart','CartController@updateCart');


//Rout for Checkout

Route::get('/loginToCheck','CheckoutController@loginToCheck');
Route::post('/storeCheckoutRegistration','CheckoutController@storeCheckout');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/storeShippingInfo','CheckoutController@storeShippingInfo');

//customer login and logout are here
Route::get('/logoutCustomer','CheckoutController@logoutCustomer');
Route::post('/checkoutLogin','CheckoutController@checkoutLogin');

//Route for payment
Route::get('/payment','CheckoutController@payment');
Route::post('/orderPlace','CheckoutController@orderPlace');




//backend routes....................
Route::get('/logout','SuperAdminController@logout');
///Route::get('/admin','AdminController@login');
Route::get('/dashboard','SuperAdminController@index'); // routes for admin dashboard
Route::get('/checkdashboard','AdminController@checkdashboard');
//Route::post('/dashboardIndex','AdminController@dashboardIndex');
Route::post('/dashboardIndex','AdminController@dashboardIndex');
Route::get('/admin','AdminController@index'); // routes for admin login

//Route for category

Route::get('/addCategory','CategoryController@index');
Route::get('/allCategory','CategoryController@allCategory');
Route::post('/storeCategory','CategoryController@storeCategory');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/editCategory/{category_id}','CategoryController@edit_category');
Route::post('/updateCategory/{category_id}','CategoryController@update_category');
Route::get('/deleteCategory/{category_id}','CategoryController@delete_category');

//Route for manufacture or brand
Route::get('/addManufacture','ManufactureController@index');
Route::get('/allManufacture','ManufactureController@allManufacture');
Route::post('/storeManufacture','ManufactureController@storeManufacture');
Route::get('/deleteManufacture/{manufacture_id}','ManufactureController@delete_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufactureController@unactive_manufacture');
Route::get('/active_manufacture/{manufacture_id}','ManufactureController@active_manufacture');
Route::get('/editManufacture/{manufacture_id}','ManufactureController@editManufacture');
Route::post('/updateManufacture/{manufacture_id}','ManufactureController@update_manufacture');

//Route for products

Route::get('/addProduct','ProductController@index');
Route::post('/storeProduct','ProductController@storeProduct');
Route::get('/allProduct','ProductController@allProduct');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/deleteproduct/{product_id}','ProductController@deleteproduct');
Route::get('/editproduct/{product_id}','ProductController@editproduct');
Route::post('/updateProduct/{product_id}','ProductController@updateProduct');


//Route for slider
Route::get('/addSlider','SliderController@index');
Route::post('/storeSlider','SliderController@storeSlider');
Route::get('/allSlider','SliderController@allSlider');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/deleteslider/{slider_id}','SliderController@deleteslider');

//Route for Order
Route::get('/allOrder','OrderInfo@allOrder');
Route::get('/showOrder/{order_id}','OrderInfo@showOrder');