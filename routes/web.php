<?php

use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/info', function () {
    return view('info');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about_us', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about_us');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::get('user/{user}/delete', ['as' => 'user.delete', 'uses' => 'App\Http\Controllers\UserController@destroy']);
});

