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

use App\Http\Controllers\EmpresaController;

use App\Http\Controllers\FornecedorController;

Route::get('/', [EmpresaController::class, 'index']);

Route::get('/empresas', [EmpresaController::class, 'home']);
Route::get('/empresa/create', [EmpresaController::class, 'create']);
Route::post('/empresas', [EmpresaController::class, 'store']);
Route::delete('/empresas/{id}', [EmpresaController::class, 'destroy']);
Route::get('/empresa/edit/{id}', [EmpresaController::class, 'edit']);
Route::put('/empresa/update/{id}', [EmpresaController::class, 'update']);

Route::get('/fornecedores', [FornecedorController::class, 'home']);
Route::get('/fornecedores/create', [FornecedorController::class, 'create']);
Route::get('/fornecedores/{id}/{id_empresa}', [FornecedorController::class, 'show']);
Route::post('/fornecedores', [FornecedorController::class, 'store']);
Route::delete('fornecedores/{id}', [FornecedorController::class, 'destroy']);
Route::get('/fornecedores/edit/{id}/{id_empresa}', [FornecedorController::class, 'edit']);
Route::put('/fornecedores/update/{id}', [FornecedorController::class, 'update']);
