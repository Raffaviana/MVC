<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\ProdutosController;

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

Route::get('/avisos', function () {

    /*
    comandos XPTOS
    */

    $avisos = [ 'avisos' => [ 0 => [    'data' => '06/09/2022',
                                        'aviso' => 'Amanhã será o bicentenário da independência do Brasil',
                                        'exibir' => true ],
                            1 => [     'data' => '08/10/2022',
                                        'aviso' => 'depois de Amanhã será o bicentenário da independência    do Brasil',
                                       'exibir' => true],
                            2 => [      'data' => '16/03/2022',
                                        'aviso' => 'Amanhã será o bicentenário da independência do Brasil',
                                        'exibir' => true]]];

    return view('avisos', $avisos);
});

/*Route::resource('/clientes', App\Http\Controllers\ClienteController::class)->middleware(['auth']);
Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class)->middleware(['auth']);
Route::resource('/produtos', App\Http\Controllers\ProdutosController::class)->middleware(['auth']);
*/
Route::group(['middleware' => ['auth']], function(){
    Route::resource('/clientes', App\Http\Controllers\ClienteController::class);
    Route::resource('/vendedores', App\Http\Controllers\VendedoresController::class);
    Route::resource('/produtos', App\Http\Controllers\ProdutosController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/roles', App\Http\Controllers\RolesController::class);

});
