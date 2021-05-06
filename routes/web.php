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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/checkEmail', [App\Http\Controllers\Auth\RegisterController::class, 'checkEmailAvailability'])->name('email_available.check');
Route::get('page/{page}/show', [App\Http\Controllers\PageController::class, 'show'])->name('page.show');
Route::post('/checkName', [App\Http\Controllers\Auth\RegisterController::class, 'checkNameAvailability'])->name('name_available.check');
Route::get('/covid', [App\Http\Controllers\CovidController::class, 'index'])->name('covid');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('admin/user', App\Http\Controllers\UserController::class);
    Route::resource('article', App\Http\Controllers\ArticleController::class);
    Route::get('admin/user/{user}/delete', ['as' => 'user.delete', 'uses' => 'App\Http\Controllers\UserController@destroy']);
    Route::get('article/{article}/delete', ['as' => 'article.delete', 'uses' => 'App\Http\Controllers\ArticleController@destroy']);
    Route::get('admin/page/{page}/delete', ['as' => 'page.delete', 'uses' => 'App\Http\Controllers\PageController@destroy']);
    Route::get('admin/page/{page}/publish', ['as' => 'page.publish', 'uses' => 'App\Http\Controllers\PageController@publish']);
    Route::put('admin/page/{page}/update', ['as' => 'page.update', 'uses' => 'App\Http\Controllers\PageController@update']);
    Route::get('admin/page/{page}/edit', [App\Http\Controllers\PageController::class, 'edit'])->name('page.edit');
    Route::get('admin/page/index', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
    Route::get('admin/page/create', [App\Http\Controllers\PageController::class, 'create'])->name('page.create');
    Route::post('admin/page/store', [App\Http\Controllers\PageController::class, 'store'])->name('page.store');
    Route::get('admin/page', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
    Route::get('admin/article', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/pripady/import', [App\Http\Controllers\ConfirmedcaseImportController::class, 'show'])->name('pripady.import');
    Route::post('pripady/store', [App\Http\Controllers\ConfirmedcaseImportController::class, 'store'])->name('pripady.store');
});

