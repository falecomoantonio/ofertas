<?php

use Illuminate\Http\Request;

Route::post('url_bitly', 'ApiController@getUrl');

Route::post('newsletters','NewsletterController@store')->name('newsletters.register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
