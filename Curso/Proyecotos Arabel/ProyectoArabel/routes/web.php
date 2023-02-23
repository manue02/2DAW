<?php

use App\Http\Controllers\ProductosController;
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

Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/modificar/{codigo}', [ProductosController::class, 'edit'])->name('productos.edit');
Route::get('/productos/crear', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/eliminar/{codigo}', [ProductosController::class, 'destroy'])->name('productos.destroy');