<?php
Route::get('user/belongsToMany{slug}', 'UserController@belongsToMany')->where(['slug' => '.*']);

Route::resource('user', 'api\UserController');

Route::post('user/where', function(Request $request){
    return response()->json(App\User::where($request->all())->get());
});

Route::get('test/roles', 'api\UserRoleController@roles');
?>