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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::resource('/user','Usercontroller');
    Route::resource('/user.profile','ProfileController');

    Route::resource('/post','PostController');


    Route::resource('/categories','CategoriesController');

    Route::resource('/tag','TagsController');

});
Route::get('/post/trashed','PostController@trashed')->name('post.trashed')->middleware('auth');
Route::get('/post/kill/{id}','PostController@kill')->name('post.kill')->middleware('auth');
Route::get('/post/restore/{id}','PostController@restore')->name('post.restore')->middleware('auth');

Route::get('/admin/settings','SettingController@index')->name('settings')->middleware('auth');
Route::put('/admin/settings','SettingController@update')->name('settings.update')->middleware('auth');