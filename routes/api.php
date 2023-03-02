<?php

use App\Http\Controllers\ApiUser_C;
use App\Http\Controllers\ApiProduk_C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/apiProduk', [ApiProduk_C::class, 'index']);
Route::get('/detailProduk/{id}', [ApiProduk_C::class, 'show']);
Route::post('/createProduk', [ApiProduk_C::class, 'store']);
Route::put('/updateProduk/{id}', [ApiProduk_C::class, 'update']);
Route::delete('/deleteProduk/{id}', [ApiProduk_C::class, 'destroy']);

Route::get('/dataUser', [ApiUser_C::class, 'index']);
Route::get('/totalUser', [ApiUser_C::class, 'show']);