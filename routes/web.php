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
/* FrontEnd Location */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/homepage', 'IndexController@index');
Route::get('/', 'IndexController@shop')->name('shop');
Route::get('/suggested/search', 'IndexController@suggestedSearch')->name('suggestedSearch');
Route::get('/contact-us', 'IndexController@contactUs');
Route::get('/list-products', 'IndexController@shop')->name('home-product');
Route::get('/search', 'IndexController@search')->name('search');
Route::get('/cat/{id}', 'IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}', 'IndexController@detialpro')->name('productDetail');
////// get Attribute ////////////
Route::get('/product-attr', 'IndexController@getAttrs')->name('productAttributes');
Route::get('/images/galleries/{product_id?}', 'ImagesController@index')->name('imageGalleries');
///// Cart Area /////////
Route::post('/add-to-cart', 'CartController@addToCart')->name('addToCart');
Route::get('/cart', 'CartController@index')->name('viewcart');
Route::get('/cart/deleteItem/{id}', 'CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}', 'CartController@updateQuantity');
/////////////////////////
/// Apply Coupon Code
Route::post('/apply-coupon', 'CouponController@applycoupon');
/// Simple User Login /////
Route::get('/login_page', 'UsersController@index')->name('login-register');
Route::post('/register_user', 'UsersController@register')->name('user-register');
Route::post('/user_login', 'UsersController@login')->name('user-login');
Route::get('/logout', 'UsersController@logout');

////// User Authentications ///////////
Route::group(['middleware' => 'FrontLogin_middleware'], function () {
    Route::get('/myaccount', 'UsersController@account');
    Route::put('/update-profile/{id}', 'UsersController@updateprofile');
    Route::put('/update-password/{id}', 'UsersController@updatepassword');
    Route::get('/check-out', 'CheckOutController@index');
    Route::post('/submit-checkout', 'CheckOutController@submitcheckout');
    Route::get('/order-review', 'OrdersController@index');
    Route::post('/submit-order', 'OrdersController@order');
    Route::get('/success/{type?}', 'OrdersController@success')->name('success');
    Route::get('/history', 'OrdersController@orderHistory')->name('history');
    // paypal phase
    Route::get('paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'OrdersController@payWithPaypal',));
    Route::get('paywithpaypal/success', array('as' => 'paywithpaypalSuccess', 'uses' => 'OrdersController@payWithPaypalSuccess',));
    // paypal phase end
});
///



/* Admin Location */
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin_home');
    /// Setting Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd', 'AdminController@chkPassword');
    Route::post('/update-pwd', 'AdminController@updatAdminPwd');
    /// Category Area
    Route::resource('/category', 'CategoryController');
    Route::get('delete-category/{id}', 'CategoryController@destroy');
    Route::get('/check_category_name', 'CategoryController@checkCateName');
    /// Products Area
    Route::resource('/product', 'ProductsController');
    Route::get('delete-product/{id}', 'ProductsController@destroy');
    Route::get('delete-image/{id}', 'ProductsController@deleteImage');
    /// Product Attribute
    Route::resource('/product_attr', 'ProductAtrrController');
    Route::get('delete-attribute/{id}', 'ProductAtrrController@deleteAttr');
    /// Product Images Gallery
    Route::resource('/image-gallery', 'ImagesController');
    Route::get('delete-imageGallery/{id}', 'ImagesController@destroy');
    /// ///////// Coupons Area //////////
    Route::resource('/coupon', 'CouponController');
    Route::get('delete-coupon/{id}', 'CouponController@destroy');
    /// Invoices

    Route::resource('/invoices', 'InvoiceController');
    Route::patch("invoices/{id}/items/{itemId}/orders/{orderId}", "InvoiceController@updatingItem")->name('update-invoice-item');
    Route::get("invoices/{invoiceId}/update/quantity/{quantity}", "InvoiceController@editQty");
    Route::get('invoices/pay/{invoiceId}', "InvoiceController@pay")->name('invoice-paid');
    Route::get('invoices/print/{orderedItemsId}', "InvoiceController@print")->name('invoice-print');
    Route::get('ordered-item/remove/{itemId}/{productAttributeId}/{amountStock}', 'InvoiceController@removeItemFromInvoice')->name('remove-item-from-invoice');
    Route::get('shipping/addresses', 'InvoiceController@getShippingAddresses')->name('shippin-addresses');
    Route::post('shipping/addresses', 'ShippingAddressController@store')->name('shippin-addresses');
    Route::post('add/ordered-item', 'InvoiceController@addOrderedItem')->name('add-ordered-items');
    Route::get('invoices/items/{orderedItemsId?}', 'InvoiceController@showOrderedItems')->name('orderedItem');
});
