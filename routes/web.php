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

// Landing routes...
Route::get('/', 'HomeController')->name('home');

// App routes...
Route::prefix('app')->group(function() {
    Route::group(['namespace' => 'App'], function () {
        // Auth routes...
        Auth::routes();
        // ...
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('domains', 'DomainController');
    });
});

// Admin routes...
Route::prefix('admin')->group(function() {
    Route::group(['namespace' => 'Admin'], function () {
        // Auth routes...
        Route::group(['namespace' => 'Auth'], function() {
            //--Admin login routes...
            Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
            Route::post('/login', 'LoginController@login');
            Route::post('/logout', 'LoginController@logout')->name('admin.logout');

            //--Admin password reset routes...
            Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
            Route::post('/password/reset', 'ForgotPasswordController@sendResetLinkEmail');
            Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
            Route::post('/password/reset/{token}', 'ResetPasswordController@reset');

            //--Account routes...
            /*Route::get('/account/validation/{email}/{token}', 'AccountController@validation')->name('admin.account.validation');
            Route::get('/account', 'AccountController@index')->name('admin.account.index');
            Route::get('/account/password', 'AccountController@password')->name('admin.account.password');
            Route::get('/account/email', 'AccountController@email')->name('admin.account.email');
            Route::put('/account', 'AccountController@update');
            Route::put('/account/password', 'AccountController@changePassword');
            Route::post('/account/email', 'AccountController@sendLink');*/
        });
    });
});
