<?php

use App\Faq;

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

Route::get('/faq', function () {
    $faqs = Faq::all();
    return view('faq', compact('faqs'));
})->name('faq');;

Auth::routes();

Route::post('admin', ['as' => 'admin.login', 'uses' => 'Auth\AdminloginController@login']);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/mailinglist', 'MailinglistController');
Route::get('/mailinglist/{mailinglist}/delete', 'MailinglistController@delete')
    ->name('mailinglist.delete');
Route::resource('/contact', 'SupportticketController');
Route::get('/admin', 'Auth\AdminloginController@adminLogin')->middleware('admin')->name('admin');
Route::get('/admin/dashboard', 'Auth\AdminController@admin')->name('admin.dashboard');
Route::resource('/admin/support', 'Auth\Admin\SupportController');
Route::resource('/admin/faq', 'Auth\Admin\FaqController');
Route::resource('/admin/packets', 'Auth\Admin\PackageController');
