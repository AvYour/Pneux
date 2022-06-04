<?php
Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
Route::post('register', 'App\Http\Controllers\Api\RegisterController@action');
Route::post('login', 'App\Http\Controllers\Api\LoginController@action');
Route::get('user', 'App\Http\Controllers\Api\UserController@action')->middleware('auth:sanctum');
Route::post('logout', 'App\Http\Controllers\Api\LogoutController@action')->middleware('auth:sanctum');
Route::post('edit', 'App\Http\Controllers\Api\EditProfileController@action')->middleware('auth:sanctum');
?>