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

// region Compra

Route::get('/compra', [\App\Http\Controllers\CompraController::class, 'index']);
Route::get('/compra/{id}/deletar', [\App\Http\Controllers\CompraController::class, 'destroy']);

// endregion

// region Parcelas compras

Route::get('/parcela-compra', [\App\Http\Controllers\ParcelaCompraController::class, 'index']);
Route::get('/parcela-compra/{id}/deletar', [\App\Http\Controllers\ParcelaCompraController::class, 'destroy']);

// endregion

// region Clientes

Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index']);
Route::get('/cliente/{id}/deletar', [\App\Http\Controllers\ClienteController::class, 'destroy']);

// endregion

// region Telefone

Route::get('/telefone', [\App\Http\Controllers\TelefoneController::class, 'index']);
Route::get('/telefone/{id}/deletar', [\App\Http\Controllers\TelefoneController::class, 'destroy']);

// endregion
