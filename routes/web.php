<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
$web_namespace = "App\\Http\\Controllers\\";
$cms_namespace = "App\\Http\\Controllers\\cms\\";
$auth_namespace = "App\\Http\\Controllers\Auth\\";

Route::get('/', 'HomepageController@entryPointVue');

// MAILING ROUTES
Route::post('/mail/contact-mail', 'MailController@contactMail');

/**
 * CMS ROUTES
 */

Route::get('/cropper', 'cms\ImageHelperController@index');
Route::resource('photo', 'cms\PhotosController');
Route::post('photo/multi', 'cms\MultiPhotosController@store');

Route::group(['prefix' => 'cms'],  function () {
    Route::group(['middleware' => ['auth']], function(){

    	// --- CORE ROUTES ONLY
        Route::get('/logout', 'cms\LogoutController@logout');
   		Route::get('/', 'cms\DashBoardController@index');
        Route::get('/edit', 'cms\FrontController@edit');
        // ----------------- GENERIC ROUTES FOR EVERY PROJECT GO HERE ----------


        // ------ CUSTOM ROUTES GO UNDERNEATH HERE ----------------
        Route::resource('entity', 'cms\FrontController');

    });
});

Auth::routes();
Route::get('home', $cms_namespace . 'HomeController@index');
Route::get('/cropper', $cms_namespace . 'ImageHelperController@index');
Route::resource('photo', $cms_namespace . 'PhotosController');
Route::post('photo/multi', $cms_namespace . 'MultiPhotosController@store');


Route::group(['prefix' => 'cms'],  function () use ($cms_namespace, $web_namespace, $auth_namespace){
    
    Route::group(['middleware' => ['auth']], function() use ($cms_namespace, $web_namespace, $auth_namespace){
        
        /**
         * Routes for CMS front-end here
         */
        
        foreach (File::glob(base_path('routes/cms/core/*.php')) as $filename) {
            if (isset($filename) && file_exists($filename)) {
                require $filename;
            }
        }
        
    });
});

// Authentication Routes...
Route::get('login', $auth_namespace . 'LoginController@showLoginForm')->name('login');
Route::post('login', $auth_namespace . 'LoginController@login');

// Registration Routes...
Route::get('register', $auth_namespace . 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', $auth_namespace . 'RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', $auth_namespace . 'ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', $auth_namespace . 'ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', $auth_namespace . 'ResetPasswordController@showResetForm');
Route::post('password/reset', $auth_namespace . 'ResetPasswordController@reset');

Route::get('home', $cms_namespace . 'HomeController@index');