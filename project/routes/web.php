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

Route::get('/', 'App\Http\Controllers\UserScreenController@index')->name('UserScreen_index');

Route::post('/', 'App\Http\Controllers\UserScreenController@search')->name('UserScreen_search');

Route::get('/search/{keyword?}', 'App\Http\Controllers\UserScreenController@result')->name('UserScreen_result');

Route::get('/terms-of-service', function () {
    return view('user.terms-of-service');
});
