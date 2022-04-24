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
Route::get('/', [App\Http\Controllers\SiteController::class, 'index']);

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


//------CRUD articles

Route::get('admin/articles', [App\Http\Controllers\Admin\ArticleController::class, 'index'])->name('admin.article.index');
Route::get('admin/articles/create', [App\Http\Controllers\Admin\ArticleController::class, 'create']);
Route::post('admin/articles/storage', [App\Http\Controllers\Admin\ArticleController::class, 'storage'])->name('admin.storage-article');
Route::get('admin/articles/edit/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'edit'])->name('admin.edit-article');
Route::put('admin/articles/update/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'update'])->name('admin.update-article');
Route::delete('admin/articles/delete/{id}', [App\Http\Controllers\Admin\ArticleController::class, 'delete'])->name('admin.delete-article');

//-----------

//--------CRUD countries

//Route::get('admin/countries', [App\Http\Controllers\Admin\CountryController::class, 'index']);
//Route::get('admin/countries/create', [App\Http\Controllers\Admin\CountryController::class, 'create']);
//Route::post('admin/countries/storage', [App\Http\Controllers\Admin\CountryController::class, 'storage'])->name('admin.storage-country');
//Route::get('admin/countries/edit/{id}', [App\Http\Controllers\Admin\CountryController::class, 'edit'])->name('admin.edit-country');
//Route::put('admin/countries/update/{id}', [App\Http\Controllers\Admin\CountryController::class, 'update'])->name('admin.update-country');
//Route::delete('admin/countries/delete/{id}', [App\Http\Controllers\Admin\CountryController::class, 'delete'])->name('admin.delete-country');

Route::middleware('role:admin')->group(function () {
    Route::get('admin', [App\Http\Controllers\Admin\AdminController::class, 'dashboard']);
    Route::resource('admin/country', \App\Http\Controllers\Admin\CountryController::class)->except(['show']);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);
});

