<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'App\Http\Controllers\UserController@index')->name('user_index');

Route::post('/', 'App\Http\Controllers\UserController@search')->name('user_search');

Route::get('/search/{keyword?}', 'App\Http\Controllers\UserController@result')->name('user_result');
Route::get('/user_page', 'App\Http\Controllers\UserController@userPage')->name('user_page');

Route::get('/ticket', 'App\Http\Controllers\UserController@ticket')->name('user_ticket');

Route::get('/thanks', 'App\Http\Controllers\UserController@thanks')->name('user_thanks');

Route::get('/terms-of-service', function () {
    return view('user.terms-of-service');
})->name('terms_of_service');

// 管理者画面
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/userlist', 'App\Http\Controllers\AdminController@userlist')->name('userlist');
    Route::post('/userlist/stop', 'App\Http\Controllers\AdminController@accountstop')->name('userlist_accountstop');
    Route::post('/userlist/active', 'App\Http\Controllers\AdminController@accountactive')->name('userlist_accountactive');
    Route::post('/userlist', 'App\Http\Controllers\AdminController@search')->name('userlist_search');
});
