<?php

use Illuminate\Http\Request;

$api_namespace = "App\\Http\\Controllers\\api\\";
$plugin_namespace = "App\\Plugins\\";

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Core routes here
 */
foreach (File::glob(base_path('routes/api/core/*.php')) as $filename) {
    if (isset($filename) && file_exists($filename)) {
        require $filename;
    }
}

/**
 * Load all the api routes for the plugins
 */
foreach(File::directories(base_path('routes/plugins')) as $directory) {
    
    foreach (File::glob($directory . '/*.php') as $filename) {
        if (isset($filename) && file_exists($filename)) {
            require $filename;
        }
    }
}

Route::group(['namespace' => $api_namespace], function() {
    // resource routes
});


Route::group(['namespace' => $plugin_namespace], function() {
    // post routes
    Route::post('/file-upload',     "FileSystem\Controllers\DossierController@store");
    
});

Route::get('news/where', 'api\NewsController@search');
Route::get('event/where', 'api\Eventcontroller@search');

Route::resource('news', 'api\NewsController');
Route::resource('event', 'api\EventController');
