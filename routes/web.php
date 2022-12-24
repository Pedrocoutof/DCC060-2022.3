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
    return view('index', [
        "request" => "",
        "response" => ""
    ]);
});

// region Produtos

Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index']);
Route::get('/produto/{id}/deletar', [\App\Http\Controllers\ProdutoController::class, 'destroy']);

// endregion
