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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/terms-of-service', function () {
    return view('user.terms-of-service');
});

// chat一覧画面製作中
Route::get('/chat', 'App\Http\Controllers\ChatController@index')->name('chat.index');

// chat画面製作中
Route::get('/chat/main', 'App\Http\Controllers\ChatController@main')->name('chat.main');
Route::post('/chat/post', 'App\Http\Controllers\ChatController@post')->name('chat.post');