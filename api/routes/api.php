<?php

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/user', 'App\Http\Controllers\Auth\UserController@userdata')->name('user.api');
    Route::get('/auth/logout', 'App\Http\Controllers\Auth\UserController@logout')->name('logout.api');
});

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::post('/registration', 'RegistrationController@registration')->name('registration.api');
    Route::post('/login', 'LoginController@login')->name('login.api');
});
