<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutControllers;
use App\Http\Controllers\C_produk;
use App\Http\Controllers\DashController;
use App\Http\Controllers\login_C;

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

Route::get('/', [login_C::class, 'index'])->name('login');
route::post('/progin',[login_C::class,'progin'])->name('progin');
route::post('/logout',[login_C::class,'logout'])->name('logout');

route::get('/register',[login_C::class,'register']);
route::post('/progis',[login_C::class,'progis']);

Route::get('/produk',[C_produk::class,'index'])->name('produk');
Route::get('/produk/create',[C_produk::class,'create']); 
Route::post('/produk/store',[C_produk::class,'store']); 
Route::get('/produk/{id}/edit',[C_produk::class,'edit']); 
Route::post('/produk/{id}/proses',[C_produk::class,'update']);
Route::delete('/produk/{id}',[C_produk::class,'destroy']);

Route::get('/dashboard',[DashController::class,'index']);