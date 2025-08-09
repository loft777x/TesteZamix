<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoSimplesController;
use App\Http\Controllers\ProdutoCompostoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('produtos')->group(function () {
    Route::get('/produtos_simples', [ProdutoSimplesController::class, 'index'])->name('produtos.index');
    Route::get('/produtos_simples/cadastrar', [ProdutoSimplesController::class, 'create'])->name('produtos.create');
    Route::post('/produtos_simples', [ProdutoSimplesController::class, 'store'])->name('produtos.store');
    Route::patch('/produtos_simples/{id}/quantidade', [ProdutoSimplesController::class, 'updateQuantity'])->name('produtos.updateQuantity');

    Route::get('/produtos_compostos', [ProdutoCompostoController::class, 'index'])->name('produtos-compostos.index');
    Route::get('/produtos_compostos/cadastrar', [ProdutoCompostoController::class, 'create'])->name('produtos-compostos.create');
    Route::post('/produtos_compostos', [ProdutoCompostoController::class, 'store'])->name('produtos-compostos.store');
});