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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about_us', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about_us');
Route::get('/page1', [App\Http\Controllers\HomeController::class, 'page1'])->name('page1');
Route::get('/CSV', [App\Http\Controllers\HomeController::class, 'CSV'])->name('CSV');
Route::post('/checkEmail', [App\Http\Controllers\Auth\RegisterController::class, 'checkEmailAvailability'])->name('email_available.check');
Route::get('page/{page}/show', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('article', App\Http\Controllers\ArticleController::class);
    Route::resource('page', App\Http\Controllers\PageController::class);
    Route::get('user/{user}/delete', ['as' => 'user.delete', 'uses' => 'App\Http\Controllers\UserController@destroy']);
    Route::get('article/{article}/delete', ['as' => 'article.delete', 'uses' => 'App\Http\Controllers\ArticleController@destroy']);
    Route::get('page/{page}/delete', ['as' => 'page.delete', 'uses' => 'App\Http\Controllers\PageController@destroy']);
});

