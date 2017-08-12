<?php

/*use Illuminate\Http\Request;*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');*/

Route::get('auth/users','AuthController@index');
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::get('auth/profile/{api_token}', 'AuthController@profile');
/*Route::get('android', 'AndroidController@index');*/
Route::post('android', 'AndroidController@index');
Route::get('android/projects', 'AndroidController@projects');
