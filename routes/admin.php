<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('login',function (){
        if (Auth::guard('admin')->check()){
            return redirect('admin/home');
        }
        return view('Admin/auth/login');
    });

    Route::post('do-log','AuthController@login')->name('do-log');

    //******* after login *******
    Route::group(['middleware' => 'admin:admin'], function () {
        Route::get('log-out','AuthController@logout')->name('log-out');
        Route::get('/',function (){
            return redirect('admin/home');
        })->name('/');
        Route::get('home','HomeController@index')->name('home');

//        Route::group(['prefix' => 'admins'], function () {
//            ################################### Admins ##########################################
//            Route::get('/', 'AdminController@index')->name('admin.index');
//            Route::post('delete', 'AdminController@delete')->name('delete_admin');
//            Route::post('add', 'AdminController@add')->name('add_admin');
//            Route::post('edit', 'AdminController@edit')->name('edit_admin');
//        });

        ################################### Profile ##########################################
        Route::get('my_profile','AdminController@my_profile')->name('my_profile');
        Route::post('store-profile','AdminController@save_profile')->name('store-profile');

        ################################### Sliders ##########################################

        ################################### Contact ##########################################
        Route::group(['prefix' => 'contacts'], function () {
            Route::get('/', 'ContactUsController@index')->name('contact.index');
            Route::post('delete', 'ContactUsController@delete')->name('delete_contact');
        });
        ###################################  ِAdmins information ##########################################
        Route::resource('admins' , 'AdminController' );
        ################################### Users ##########################################
        Route::get('users/get' , 'UserController@index' )->name('users.index');
        Route::put('users/block/{id}' ,'UserController@block_users' )->name('users.block');
        Route::put('users/unblock/{id}' ,'UserController@unblock_users' )->name('users.unblock');
        Route::delete('users/destroy/{id}' ,'UserController@destroy' )->name('users.destroy');

        ################################### Sliders ##########################################
        Route::resource('sliders' , 'SliderController' );


        ################################### Blogs ##########################################
        Route::resource('blogs' , 'BlogController' );

        ################################### setting ##########################################
        Route::resource('settings' , 'SettingsController' );

        ################################### about ##########################################
        Route::resource('abouts' , 'AboutController' );

        ################################### contact ##########################################
        Route::get('contact-get' , 'ContactController@index' )->name('get_contact');
        ################################### Reservations ##########################################
        Route::resource('reservations' , 'ReservationController' );
        Route::get('reservations-last','ReservationController@reservationsLast')->name('reservations.last');
        Route::get('reservations-new','ReservationController@reservationsNew')->name('reservations.new');
        ################################### Order ##########################################
        Route::resource('orders' , 'OrderController' );
        Route::get('orders-last','OrderController@ordersLast')->name('orders.last');
        Route::get('orders-new','OrderController@ordersNew')->name('orders.new');
        ################################### services ##########################################
        Route::resource('services' , 'ServiceController' );
        ################################### products ##########################################
        Route::resource('products' , 'ProductController' );
        ################################### Online Consultations ##########################################
        Route::resource('consultations' , 'ConsultationController' );
        ################################### chat  ##########################################
        Route::get('chat/get' , 'ChatController@index' )->name('chats.index');
        Route::get('chat/chatForm' , 'ChatController@chatForm' )->name('chats.send');
        Route::post('chat/getUsers' , 'ChatController@getUsers')->name('chats.users');
        Route::get('getOldMessages','ChatController@getOldMessages')->name('getOldMessages');
        Route::delete('chat/delete/{id}' , 'ChatController@destroy' )->name('chats.destroy');






        // ahmed yahya
        Route::post('sendAdminMessage' , 'ChatController@sendAdminMessage' )->name('sendAdminMessage');
        Route::get('getNewMessage' , 'ChatController@getNewMessage' )->name('getNewMessage');
        Route::get('getOldMessages' , 'ChatController@getOldMessages' )->name('getOldMessages');
        Route::post('markAsRead' , 'ChatController@markAsRead' )->name('markAsRead');
        Route::get('testSend' , 'ChatController@testSend' )->name('testSend');





        ################################### chat  ##########################################
    Route::get('messages', '\App\Http\Livewire\Admin\Messages\ListMessages')->name('messages');
    });//end Middleware Admin

});//end Prefix
