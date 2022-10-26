<?php

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

Route::prefix('v1')->group(static function(){
    Route::get('/vendedores', [App\Http\Controllers\vendedorapicontroller::class, 'index']);
    Route::post('/vendedores', [App\Http\Controllers\vendedorapicontroller::class, 'store']);
    Route::delete('/vendedores/{id}', [App\Http\Controllers\vendedorapicontroller::class, 'destroy']);
    Route::get('/vendedores/{id}', [App\Http\Controllers\vendedorapicontroller::class, 'show']);
    Route::put('/vendedores/{id}', [App\Http\Controllers\vendedorapicontroller::class, 'update']);

    Route::get('/clientes', [App\Http\Controllers\clienteapicontroller::class, 'index']);
    Route::post('/clientes', [App\Http\Controllers\clienteapicontroller::class, 'store']);
    Route::delete('/clientes/{id}', [App\Http\Controllers\clienteapicontroller::class, 'destroy']);
    Route::get('/clientes/{id}', [App\Http\Controllers\clienteapicontroller::class, 'show']);
    Route::put('/clientes/{id}', [App\Http\Controllers\clienteapicontroller::class, 'update']);

    Route::get('/produtos', [App\Http\Controllers\produtoapicontroller::class, 'index']);
    Route::post('/produtos', [App\Http\Controllers\produtoapicontroller::class, 'store']);
    Route::delete('/produtos/{id}', [App\Http\Controllers\produtoapicontroller::class, 'destroy']);
    Route::get('/produtos/{id}', [App\Http\Controllers\produtoapicontroller::class, 'show']);
    Route::put('/produtos/{id}', [App\Http\Controllers\produtoapicontroller::class, 'update']);
});
