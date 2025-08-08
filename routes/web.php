<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoSimplesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('produtos')->group(function () {
    Route::get('/produto_simples', [ProdutoSimplesController::class, 'index'])->name('produtos.index');
    Route::get('/produto_simples/cadastrar', [ProdutoSimplesController::class, 'create'])->name('produtos.create');
    Route::post('/produto_simples', [ProdutoSimplesController::class, 'store'])->name('produtos.store');
    Route::patch('/produto_simples/{id}/quantidade', [ProdutoSimplesController::class, 'updateQuantity'])->name('produtos.updateQuantity');
});