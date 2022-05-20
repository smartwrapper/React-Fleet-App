<?php

use App\Mail\ContactUs;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
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

// if(!file_exists(storage_path('installed'))){
// 	return redirect('/install');
// }



Route::get('contact-us-email', function () {
    $data = ['first_name' => 'Umar', 'last_name' => 'Aslam', 'email' => 'umar@abc.com', 'message' => 'lorem ipsum', 'phone' => ''];
    return (new ContactUs($data))->render();
});

// Route::get('install', function () {

// });

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');

});

Route::any('admin/{all}', function () {
    return view('layouts.admin-master');
})
    ->where(['all' => '.*']);

    // Route::group(['middleware' => ['general','installer']], function () {
    //     Route::get('/', function () {
    //         return redirect('/admin/login');
    //     });
    // });
    Route::get('/hyperpay', 'Web\IndexController@getcall');

Route::group(['middleware' => ['general','installer']], function () {

    Route::get('/', 'Web\IndexController@index');

    Route::get('/product/{id}/{slug}', 'Web\IndexController@productDetail');
    Route::get('/shop', 'Web\IndexController@shop');
    Route::get('/cart', 'Web\IndexController@cartPage');
    Route::get('/blog-detail/{slug}', 'Web\IndexController@blogDetail');
    Route::get('/blog', 'Web\IndexController@blog');
    Route::get('/checkout', 'Web\IndexController@checkout');
    Route::get('/login', 'Web\IndexController@login');
    Route::get('/compare', 'Web\IndexController@compare');
    Route::get('/orders', 'Web\IndexController@orders');
    Route::get('/orders/{id}', 'Web\IndexController@ordersDetail');
    Route::get('/profile', 'Web\IndexController@profile');
    Route::get('/thankyou', 'Web\IndexController@thankyou')->name('thankyou');
    Route::get('/shipping-address', 'Web\IndexController@shippingAddress');

    Route::get('/wishlist', 'Web\IndexController@wishlist');
    Route::get('/change-password', 'Web\IndexController@changePassword');

    Route::get('/page/{slug}', 'Web\IndexController@page');

    Route::get('/privacy', 'Web\IndexController@privacy');
    Route::get('/refund', 'Web\IndexController@refund');
    Route::get('/term', 'Web\IndexController@term');
    Route::get('/contact-us', 'Web\IndexController@contactUs');
    Route::get('/about-us', 'Web\IndexController@aboutUs');

    Route::get('set_currency/{currency}', 'Web\IndexController@setCurrency');
    Route::get('paytm-pay', 'Web\IndexController@paytmPayment');
    Route::get('order-web-view', 'Web\IndexController@orderWebView');
    Route::get('lang/{locale}', 'LocalizationController@index');
    

});

Route::group(['middleware' => ['general','installer']], function () {

    Route::get('/', 'Web\IndexController@index');

    Route::get('/product/{id}/{slug}', 'Web\IndexController@productDetail');
    Route::get('/shop', 'Web\IndexController@shop');
    Route::get('/cart', 'Web\IndexController@cartPage');
    Route::get('/blog-detail/{slug}', 'Web\IndexController@blogDetail');
    Route::get('/blog', 'Web\IndexController@blog');
    Route::get('/checkout', 'Web\IndexController@checkout');
    Route::get('/login', 'Web\IndexController@login');
    Route::get('/compare', 'Web\IndexController@compare');
    Route::get('/orders', 'Web\IndexController@orders');
    Route::get('/orders/{id}', 'Web\IndexController@ordersDetail');
    Route::get('/profile', 'Web\IndexController@profile');
    Route::get('/thankyou', 'Web\IndexController@thankyou');
    Route::get('/shipping-address', 'Web\IndexController@shippingAddress');

    Route::get('/wishlist', 'Web\IndexController@wishlist');
    Route::get('/change-password', 'Web\IndexController@changePassword');

    Route::get('/page/{slug}', 'Web\IndexController@page');

    Route::get('/privacy', 'Web\IndexController@privacy');
    Route::get('/refund', 'Web\IndexController@refund');
    Route::get('/term', 'Web\IndexController@term');
    Route::get('/contact-us', 'Web\IndexController@contactUs');
    Route::get('/about-us', 'Web\IndexController@aboutUs');

    Route::get('set_currency/{currency}', 'Web\IndexController@setCurrency');
    Route::post('paytm-pay', 'Web\IndexController@paytmPayment');
    Route::post('paytm_response', 'Web\IndexController@paytmResponse');
    Route::get('mollie-payment/{order_id}', 'Web\IndexController@molliePayment');
    Route::post('mollie-webhook', 'Web\IndexController@mollieWebHook');

    


    

    
    Route::get('order-web-view', 'Web\IndexController@orderWebView');
    Route::get('lang/{locale}', 'LocalizationController@index');

    Route::get('/payment-paystck/callback', 'Web\IndexController@handleGatewayCallback')->name('payment');
    Route::get('/payment-desgin',function(){
        return view('paymentdesign');
    });


    
    
    Route::get('update-settings-by-user', 'Web\IndexController@updateSettingsByUser');
    Route::get('reset-demo-settings', 'Web\IndexController@ResetDemoSettings');

    

    

});
