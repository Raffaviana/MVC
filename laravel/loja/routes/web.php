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
