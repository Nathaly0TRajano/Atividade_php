<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('produto', [ProdutoController::class, 'store']);
Route::get('produto', [ProdutoController::class, 'index']);
Route::put('produto/update', [ProdutoController::class, 'update']); // Colocamos no controller, que ele vai requerir o id, pra realizar o find
Route::delete('produto/{id}', [ProdutoController::class, 'delete']);
Route::get('produto/{id}', [ProdutoController::class, 'show']); //Pesquisa por id
Route::get('produto/find/name', [ProdutoController::class, 'findByName']);
Route::get('produto/find/maior', [ProdutoController::class, 'pesquisarMaiorValorQue']);
Route::get('produto/find/entre/valores', [ProdutoController::class, 'pesquisarEntreValores']);
Route::get('produto/find/marca', [ProdutoController::class, 'encontrarPorMarca']);
Route::get('produto/find/ano', [ProdutoController::class, 'pesquisarPorAno']);
Route::get('produto/find/mes', [ProdutoController::class, 'pesquisarPorMes']);

//

Route::post('cliente', [ClienteController::class, 'store']);
Route::get('cliente/find', [ClienteController::class, 'findById']);
Route::get('cliente/{id}', [ClienteController::class, 'show']);
Route::get('cliente', [ClienteController::class, 'index']);
Route::put('cliente/update', [ClienteController::class, 'update']);
Route::delete('cliente/delete', [ClienteController::class, 'delete']);
Route::get('cliente/find/email', [ClienteController::class, 'findByEmail']);