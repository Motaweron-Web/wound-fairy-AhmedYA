<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//================================== auth ============================
Route::group(['namespace' => 'Auth','prefix' => 'auth'],function (){

    Route::post('login','AuthController@login');
    Route::post('logout','AuthController@logout');
    Route::POST('register','AuthController@register');
    Route::get('getProfile','AuthController@getProfile');
    Route::POST('update_profile','AuthController@update_profile');
    Route::POST('insert_token','AuthController@insert_token');
});

Route::group(['namespace' => 'Home','prefix' => 'home'],function () {
    //////////////// slider
    Route::get('slider','HomeController@slider');
    //////////////// setting
    Route::get('setting','HomeController@setting');
    //////////////// about us
    Route::get('about-us','HomeController@about_us');
    //////////////// products
    Route::get('products','HomeController@products');
    //////////////// blogs
    Route::get('blogs','HomeController@blogs');
    //////////////// blogs
    Route::get('online-consultations','HomeController@online_consultations');
    //////////////// services
    Route::get('services','HomeController@services');
    //////////////// notifications
    Route::get('notifications','HomeController@notifications');
    //////////////// contact-us
    Route::POST('contact-us','HomeController@contact_us');
});

Route::group(['namespace' => 'Order','prefix' => 'order','middleware'=>'jwt'],function () {

    Route::POST('store-order','OrderController@storeOrder');
    Route::POST('edit-order','OrderController@editOrder');
    Route::get('getOrders','OrderController@getOrders');

});
Route::group(['namespace' => 'Reservation','prefix' => 'reservation','middleware'=>'jwt'],function () {

    Route::POST('store-reservation','ReservationController@storeReservation');
    Route::POST('edit-reservation','ReservationController@editReservation');
    Route::get('getReservations','ReservationController@getReservations');

});

Route::group(['namespace' => 'Order','prefix' => 'order','middleware'=>'jwt'],function () {

    Route::POST('store-order','OrderController@storeOrder');
    Route::get('getOrders','OrderController@getOrders');

});

Route::group(['namespace' => 'Chat','prefix' => 'chat','middleware'=>'jwt'],function () {

    Route::POST('store-chat-data','ChatController@storeChatData');

    Route::get('user-chat','ChatController@user_chat');
    Route::POST('store-chat-message','ChatController@storeChatMessage');

});

Route::fallback(function () {
    return helperJson(null,'URL NOT FOUND!',404);
});

