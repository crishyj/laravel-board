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



Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{slug}', 'StatusController@index')->name('status_index');
Route::get('/{slug}/id', 'StatusController@delete')->name('user_delete');
Route::get('/{slug}/edit_status', 'StatusController@updateStatus')->name('status_edit');
Route::post('/{slug}/edit_status', 'StatusController@storeStatus')->name('status_store');
Route::get('/edit_status/{id}', 'StatusController@deleteStatus')->name('status_delete');

Route::get('/{slug}/edit_board', 'StatusController@updateBoard')->name('board_edit');
Route::post('/{slug}/edit_board', 'StatusController@storeBoard')->name('board_store');