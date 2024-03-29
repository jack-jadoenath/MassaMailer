<?php

use App\Faq;
use App\Package;
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
    $packets = Package::all();
    return view('home', compact('packets'));
});

Route::get('/faq', function () {
    $faqs = Faq::all();
    return view('faq', compact('faqs'));
})->name('faq');;

Route::get('/packets', function () {
    $packets = Package::all();
    return view('packets', compact('packets'));
})->middleware('guest')->name('packets');;

Auth::routes();

Route::post('admin', ['as' => 'admin.login', 'uses' => 'Auth\AdminloginController@login'])->middleware('auth');;
Route::post('packets', ['as' => 'packets.select', 'uses' => 'Auth\Admin\PackageController@select']);


Route::resource('/account', 'UserController');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/mailinglist', 'MailinglistController')->middleware('auth');
Route::resource('/contact', 'SupportticketController');
Route::resource('/templates', 'TemplateController')->middleware('auth');
Route::resource('/mail', 'MailController')->middleware('auth');
Route::resource('/recipient', 'RecipientController')->middleware('auth');
Route::get('/admin', 'Auth\AdminloginController@adminLogin')->middleware('admin')->name('admin');
Route::get('/admin/dashboard', 'Auth\AdminController@admin')->middleware('admin')->name('admin.dashboard');
Route::resource('/admin/support', 'Auth\Admin\SupportController')->middleware('admin');
Route::resource('/admin/faq', 'Auth\Admin\FaqController')->middleware('admin');
Route::resource('/admin/packets', 'Auth\Admin\PackageController')->middleware('admin');
Route::resource('/admin/user', 'Auth\Admin\UserManageController')->middleware('admin');
