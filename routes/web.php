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

Route::get('/admin/categorias' ,[App\Http\Controllers\Admin\CategoriaController::class,'index'])->name('admin.categorias');
Route::post('/admin/categorias/store' ,[App\Http\Controllers\Admin\CategoriaController::class,'store'])->name('admin.categorias.store');
Route::post('/admin/categorias/{categoryId}/update' ,[App\Http\Controllers\Admin\CategoriaController::class,'update'])->name('admin.categorias.update');
Route::delete('/admin/categorias/{categoryId}/delete' ,[App\Http\Controllers\Admin\CategoriaController::class,'delete'])->name('admin.categorias.delete');

Auth::routes();



