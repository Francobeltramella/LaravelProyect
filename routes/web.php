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




Route::get('/admin/productos' ,[App\Http\Controllers\Admin\ProductoController::class,'index'])->name('admin.productos');
Route::post('/admin/productos/store' ,[App\Http\Controllers\Admin\ProductoController::class,'store'])->name('admin.productos.store');
Route::post('/admin/productos/{productId}/update' ,[App\Http\Controllers\Admin\ProductoController::class,'update'])->name('admin.productos.update');
Route::delete('/admin/productos/{productId}/delete' ,[App\Http\Controllers\Admin\ProductoController::class,'delete'])->name('admin.productos.delete');

Route::get('/public' ,[App\Http\Controllers\PublicController::class,'index'])->name('public');



Auth::routes();



