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

Route::get('/my-first-page', [\App\Http\Controllers\MyController::class, 'myPage']);

//-----authorization

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//------

//------custom authorization

//Route::get('login', [\App\Http\Controllers\AuthController::class, 'login']);
//Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'] )->name('logout');
//Route::post('auth', [\App\Http\Controllers\AuthController::class, 'auth']);

//------

Route::get('admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard']);

//------CRUD articles

Route::get('admin/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index']);
Route::get('admin/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create']);
Route::post('admin/articles/storage', [App\Http\Controllers\Admin\ArticleController::class, 'storage'])->name('admin.storage-article');
Route::get('admin/articles/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.edit-article');
Route::put('admin/articles/update/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin.update-article');
Route::delete('admin/articles/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('admin.delete-article');

//-----------



