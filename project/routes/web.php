<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;

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

Route::get('/search', 'App\Http\Controllers\UserScreenController@search')->name('UserScreen_search');

Route::get('/admin/userlist', 'App\Http\Controllers\AdminController@userlist');

Route::get('/terms-of-service', function () {
    return view('user.terms-of-service');
});












// Route::get('/admin/userlist',function () {
//     return view('admin.user-list');
// });