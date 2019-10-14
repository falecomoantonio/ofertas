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


Route::get('/', 'HomeController@showOffers')->name('homepage');
Route::get('/blog', 'HomeController@blog')->name('blog');

Auth::routes(['register'=>false,'verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function(){

    Route::resources([
        'administrators' => 'AdministratorController',
        'blog' => 'BlogController',
        'categories'=>'CategoryController',
        'offers'=>'OfferController',
    ]);

    Route::resource('offers',OfferController::class);

    Route::get('settings','SettingsController@index')->name('settings.index');
    Route::post('settings/metadata/change','SettingsController@changeKeyValue')->name('settings.changemetadata');
    Route::post('settings/metadata/change1','SettingsController@frm1KeyValue')->name('settings.changemetadata1');
    Route::post('settings/metadata/change2','SettingsController@frm2KeyValue')->name('settings.changemetadata2');
    Route::post('settings/banner','SettingsController@changeBannerApplication')->name('settings.changebanner');

    Route::get('offers/change/price','OfferController@index2alter')->name('offers.changeprice');
    Route::put('offers/change/price','OfferController@updatePrice')->name('offers.change.price');

    Route::resource('newsletters',NewsletterController::class,['exception'=>['update','show','create']]);


    Route::get('/profile','AdministratorController@myProfile')->name('administrators.profile')->middleware('verified');
    Route::post('/profile','AdministratorController@saveProfile')->name('administrators.profile.save');
    Route::post('/profile/password','AdministratorController@changePassword')->name('administrators.profile.password');

    Route::get('/','DashboardController@start')->name('dashboard.start');
});


