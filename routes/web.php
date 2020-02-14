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
        Route::resource('countries', 'CountryController');
    });
});

// Admin routes...
Route::prefix('admin')->group(function() {
    Route::group(['namespace' => 'Admin'], function () {
        Route::group(['namespace' => 'Auth'], function() {
            // Auth routes...
            Route::get('/', function () { return redirect(route('admin.login')); });
            Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
            Route::post('login', 'LoginController@login');
            Route::post('logout', 'LoginController@logout')->name('admin.logout');
            //--Account routes...
            /*Route::get('/account/validation/{email}/{token}', 'AccountController@validation')->name('admin.account.validation');
            Route::get('/account', 'AccountController@index')->name('admin.account.index');
            Route::get('/account/password', 'AccountController@password')->name('admin.account.password');
            Route::get('/account/email', 'AccountController@email')->name('admin.account.email');
            Route::put('/account', 'AccountController@update');
            Route::put('/account/password', 'AccountController@changePassword');
            Route::post('/account/email', 'AccountController@sendLink');*/
        });
        // ...
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::get('settings', 'SettingController@index')->name('admin.settings.index');
        Route::post('settings', 'SettingController@update')->name('admin.settings.update');
        Route::resource('domains', 'DomainController', [
            'names' => ['index' => 'admin.domains.index', 'create' => 'admin.domains.create',
                'store' => 'admin.domains.store', 'show' => 'admin.domains.show',
                'edit' => 'admin.domains.edit', 'update' => 'admin.domains.update',
                'destroy' => 'admin.domains.destroy']
        ]);
        Route::resource('countries', 'CountryController', [
            'names' => ['index' => 'admin.countries.index', 'create' => 'admin.countries.create',
                'store' => 'admin.countries.store', 'show' => 'admin.countries.show',
                'edit' => 'admin.countries.edit', 'update' => 'admin.countries.update',
                'destroy' => 'admin.countries.destroy']
        ]);
    });
});
