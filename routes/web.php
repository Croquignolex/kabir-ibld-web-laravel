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
Route::get('/', 'HomeController@index')->name('home');
Route::post('/contact', 'HomeController@contact')->name('contact');

// App routes...
Route::prefix('app')->group(function() {
    Route::group(['namespace' => 'App'], function () {
        // Auth routes...
        Auth::routes();
        Route::group(['namespace' => 'Auth'], function() {
            //--Account routes...
            Route::get('/account/{token}/validation/{email}', 'AccountController@validation')->name('account.validation');
            Route::get('/account', 'AccountController@index')->name('account.index');
            Route::put('/account', 'AccountController@update');
            Route::put('/account/avatar', 'AccountController@changeAvatar')->name('account.avatar');
            Route::put('/account/password', 'AccountController@changePassword')->name('account.password');
        });
        // ...
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        // Domains routes...
        Route::get('domains/subscribed', 'DomainController@subscribed')->name('domains.subscribed');
        Route::put('domains/{domain}/subscribe', 'DomainController@subscribe')->name('domains.subscribe');
        Route::resource('domains', 'DomainController')->only('index', 'show');
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
            Route::get('/account', 'AccountController@index')->name('admin.account.index');
            Route::put('/account', 'AccountController@update');
            Route::put('/account/avatar', 'AccountController@changeAvatar')->name('admin.account.avatar');
            Route::put('/account/password', 'AccountController@changePassword')->name('admin.account.password');
        });
        // ...
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        // Setting routes...
        Route::get('settings', 'SettingController@index')->name('admin.settings.index');
        Route::post('settings', 'SettingController@update')->name('admin.settings.update');
        // Contact routes...
        Route::post('contacts/answer/{contact}', 'ContactController@answer')->name('admin.contacts.answer');
        Route::resource('contacts', 'ContactController')->only('index', 'show', 'destroy')->names([
            'show' => 'admin.contacts.show', 'index' => 'admin.contacts.index',
            'destroy' => 'admin.contacts.destroy'
        ]);
        // Domains routes...
        Route::resource('domains', 'DomainController')->names([
            'destroy' => 'admin.domains.destroy', 'store' => 'admin.domains.store',
            'update' => 'admin.domains.update', 'index' => 'admin.domains.index',
            'show' => 'admin.domains.show', 'edit' => 'admin.domains.edit',
            'create' => 'admin.domains.create',
        ]);
        // Users routes...
        Route::delete('users/grant/admin/{user}', 'UserController@grantAdmin')->name('admin.users.grant.admin');
        Route::delete('users/grant/super/admin/{user}', 'UserController@grantSuperAdmin')->name('admin.users.grant.super.admin');
        Route::resource('users', 'UserController')->except('edit', 'show', 'update')->names([
            'destroy' => 'admin.users.destroy', 'store' => 'admin.users.store',
            'index' => 'admin.users.index', 'create' => 'admin.users.create',
        ]);
        // Services routes...
        Route::resource('services', 'ServiceController')->except('show')->names([
            'store' => 'admin.services.store', 'destroy' => 'admin.services.destroy',
            'index' => 'admin.services.index', 'create' => 'admin.services.create',
            'edit' => 'admin.services.edit', 'update' => 'admin.services.update',
        ]);
        // Countries routes...
        Route::resource('countries', 'CountryController')->except('show')->names([
            'store' => 'admin.countries.store', 'destroy' => 'admin.countries.destroy',
            'index' => 'admin.countries.index', 'create' => 'admin.countries.create',
            'edit' => 'admin.countries.edit', 'update' => 'admin.countries.update',
        ]);
        // Documents routes...
        Route::delete('documents/download/{document}', 'DocumentController@download')->name('admin.documents.download');
        Route::resource('documents', 'DocumentController')->except('show')->names([
            'store' => 'admin.documents.store', 'destroy' => 'admin.documents.destroy',
            'index' => 'admin.documents.index', 'create' => 'admin.documents.create',
            'edit' => 'admin.documents.edit', 'update' => 'admin.documents.update',
        ]);
        // Contributors routes...
        Route::resource('contributors', 'ContributorController')->except('show')->names([
            'store' => 'admin.contributors.store', 'destroy' => 'admin.contributors.destroy',
            'index' => 'admin.contributors.index', 'create' => 'admin.contributors.create',
            'edit' => 'admin.contributors.edit', 'update' => 'admin.contributors.update',
        ]);
    });
});
