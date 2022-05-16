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

Route::get('/beginner', 'App\Http\Controllers\UserController@beginner')->name('user_beginner');

Route::get('/search/{keyword?}', 'App\Http\Controllers\UserController@result')->name('user_result');

Route::get('/user_page', 'App\Http\Controllers\UserController@userPage')->name('user_page');

Route::get('/ticket', 'App\Http\Controllers\TicketController@index')->name('user_ticket');
Route::post('/ticket', 'App\Http\Controllers\TicketController@buy')->name('buy_ticket');

Route::get('/thanks', 'App\Http\Controllers\TicketController@thanks')->name('user_thanks');

Route::get('/terms-of-service', function () {
    return view('user.terms-of-service');
})->name('terms_of_service');

Route::get('/privacy-policy', function () {
    return view('user.privacy-policy');
})->name('privacy_policy');


// 管理者画面
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/userlist', 'App\Http\Controllers\AdminController@userlist')->name('userlist');
    Route::post('/userlist/stop', 'App\Http\Controllers\AdminController@accountStop')->name('userlist_accountStop');
    Route::post('/userlist/active', 'App\Http\Controllers\AdminController@accountActive')->name('userlist_accountActive');
    Route::post('/userlist', 'App\Http\Controllers\AdminController@search')->name('userlist_search');

    Route::get('/index', 'App\Http\Controllers\AdminController@index')->name('index');

    Route::get('/call-evaluation', 'App\Http\Controllers\AdminController@callEvaluation')->name('call_evaluation');
});
