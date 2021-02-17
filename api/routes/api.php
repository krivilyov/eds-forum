<?php

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/user', 'App\Http\Controllers\Auth\UserController@userdata')->name('user.api');
    Route::post('/auth/logout', 'App\Http\Controllers\Auth\UserController@logout')->name('logout.api');
    Route::post('/article/create', 'App\Http\Controllers\Articles\ArticlesController@createArticle');
});

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::post('/registration', 'RegistrationController@registration')->name('registration.api');
    Route::post('/login', 'LoginController@login')->name('login.api');
});

Route::group(['namespace' => 'App\Http\Controllers\Articles'], function() {
    Route::post('/categories', 'CategoriesController');
    Route::post('/articles', 'ArticlesController@getArticles');
    Route::post('/article', 'ArticlesController@getArticle');
//    Route::post('/article/create', 'ArticlesController@createArticle');
});
