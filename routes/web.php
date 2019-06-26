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
    return view('home');
});

Auth::routes();

Route::post('admin',['as' => 'admin.login', 'uses'=>'Auth\AdminloginController@login']);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/contact', 'SupportticketController');
Route::get('/admin', 'Auth\AdminloginController@adminLogin')->middleware('admin')->name('admin');
Route::get('/admin/dashboard', 'Auth\AdminController@admin')->name('admin.dashboard');


/*

get('protected', ['middleware' => ['auth', 'admin'], function() {
    // this page requires that you be logged in AND be an Admin
    return view( ... );
}]);

get('protected', ['middleware' => ['auth'], function() {
    // this page requires that you be logged inbut you don't need to be an admin
    return view( ... );
}]);

*/