<?php

use Illuminate\Http\Request;

Route::post('url_bitly', 'ApiController@getUrl')->name('api.get.bitly');

Route::post('newsletters','NewsletterController@store')->name('newsletters.register');

Route::post('maintenance/check', 'ApiController@verifyIfMaintenanceMode')->name('api.check.maintenance');

Route::post('maintenance/up', 'ApiController@disableMaintenanceMode')->name('api.up.maintenance');

Route::post('maintenance/down', 'ApiController@enableMaintenanceMode')->name('api.down.maintenance');

Route::post('cacheclear', 'ApiController@cacheClear')->name('api.clear.cache');
