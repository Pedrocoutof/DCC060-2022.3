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

Route::get('/', [\App\Http\Controllers\IndexPageController::class, 'index']);
Route::get('/carga', [\App\Http\Controllers\IndexPageController::class, 'makeCharge']);
Route::get('/createTables', [\App\Http\Controllers\IndexPageController::class, 'createTables']);
Route::get('/dropAllTables', [\App\Http\Controllers\IndexPageController::class, 'dropAllTables']);
Route::get('/deleteTables', [\App\Http\Controllers\IndexPageController::class, 'deleteAllTables']);


// region Produtos

Route::get('/produto', [\App\Http\Controllers\ProdutoController::class, 'index']);
Route::get('/produto/{id}/deletar', [\App\Http\Controllers\ProdutoController::class, 'destroy']);

// endregion
// region Pessoas
Route::get('/pessoas', [\App\Http\Controllers\PessoasController::class, 'index']);
Route::get('/pessoas/{id}/deletar', [\App\Http\Controllers\PessoasController::class, 'destroy']);
// endregion

// region Funcionarios
Route::get('/funcionarios', [\App\Http\Controllers\FuncionariosController::class, 'index']);
Route::get('/funcionarios/{id}/deletar', [\App\Http\Controllers\FuncionariosController::class, 'destroy']);
Route::get('/input_funcionario', [\App\Http\Controllers\FuncionariosController::class, 'create']);
Route::get('/create_funcionario', [\App\Http\Controllers\FuncionariosController::class, 'store']);

// endregion

// region Compra

Route::get('/compra', [\App\Http\Controllers\CompraController::class, 'index']);
Route::get('/compra/{id}/deletar', [\App\Http\Controllers\CompraController::class, 'destroy']);
Route::get('/input_compra', [\App\Http\Controllers\CompraController::class, 'create']);
Route::get('/store_compra', [\App\Http\Controllers\CompraController::class, 'store']);

// endregion

// region Parcelas compras

Route::get('/parcela-compra', [\App\Http\Controllers\ParcelaCompraController::class, 'index']);
Route::get('/parcela-compra/{id}/deletar', [\App\Http\Controllers\ParcelaCompraController::class, 'destroy']);

// endregion

// region Clientes

Route::get('/cliente', [\App\Http\Controllers\ClienteController::class, 'index']);
Route::get('/cliente/{id}/deletar', [\App\Http\Controllers\ClienteController::class, 'destroy']);
Route::get('/input_cliente', [\App\Http\Controllers\ClienteController::class, 'create']);
Route::get('/create_cliente', [\App\Http\Controllers\ClienteController::class, 'store']);


// endregion

// region Telefone

Route::get('/telefone', [\App\Http\Controllers\TelefoneController::class, 'index']);
Route::get('/telefone/{id}/deletar', [\App\Http\Controllers\TelefoneController::class, 'destroy']);

// endregion

// region Endereço

Route::get('/endereco', [\App\Http\Controllers\EnderecoController::class, 'index']);
Route::get('/endereco/{id}/deletar', [\App\Http\Controllers\EnderecoController::class, 'destroy']);

// endregion

// region Entregador

Route::get('/entregador', [\App\Http\Controllers\EntregadorController::class, 'index']);
Route::get('/entregador/{id}/deletar', [\App\Http\Controllers\EntregadorController::class, 'destroy']);

// endregion

// region Transportadora

Route::get('/transportadora', [\App\Http\Controllers\TransportadoraController::class, 'index']);
Route::get('/transportadora/{id}/deletar', [\App\Http\Controllers\TransportadoraController::class, 'destroy']);

// endregion

// region Usuario

Route::get('/usuario', [\App\Http\Controllers\UsuarioController::class, 'index']);
Route::get('/usuario/{id}/deletar', [\App\Http\Controllers\UsuarioController::class, 'destroy']);

// endregion

// region Vendas

Route::get('/venda', [\App\Http\Controllers\VendaController::class, 'index']);
Route::get('/venda/{id}/deletar', [\App\Http\Controllers\VendaController::class, 'destroy']);
Route::get('/input_venda', [\App\Http\Controllers\VendaController::class, 'create']);
Route::get('/store_venda', [\App\Http\Controllers\VendaController::class, 'store']);


// endregion

// region Entregas

Route::get('/entrega', [\App\Http\Controllers\EntregaController::class, 'index']);
Route::get('/entrega/{id}/deletar', [\App\Http\Controllers\EntregaController::class, 'destroy']);

// endregion

// region Parcelas vendas

Route::get('/parcela-venda', [\App\Http\Controllers\ParcelaVendaController::class, 'index']);
Route::get('/parcela-venda/{id}/deletar', [\App\Http\Controllers\ParcelaVendaController::class, 'destroy']);

// endregion
