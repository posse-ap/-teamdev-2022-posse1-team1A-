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

require __DIR__ . '/auth.php';

Route::get('/', 'App\Http\Controllers\UserController@index')->name('user_index');

Route::post('/', 'App\Http\Controllers\UserController@search')->name('user_search');

Route::get('/search/{keyword?}', 'App\Http\Controllers\UserController@result')->name('user_result');

Route::get('/ticket', 'App\Http\Controllers\UserController@ticket')->name('user_ticket');

Route::get('/terms-of-service', function () {
    return view('user.terms-of-service');
});

// chat一覧画面
Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {
    Route::get('/respondent', 'App\Http\Controllers\ChatController@respondent_chat_list')->name('respondent_chat_list');
    Route::get('client', 'App\Http\Controllers\ChatController@client_chat_list')->name('client_chat_list');

    // chat画面製作中
    Route::get('/{chat_id}', 'App\Http\Controllers\ChatController@index')->name('index');
    Route::post('post', 'App\Http\Controllers\ChatController@post')->name('post');
});
