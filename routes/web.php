<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoSimplesController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/produto_simples', [ProdutoSimplesController::class, 'index'])->name('produtos.index');

Route::get('/produtos/produto_simples/cadastrar', [ProdutoSimplesController::class, 'create'])->name('produtos.create');

Route::post('/produtos/produto_simples', [ProdutoSimplesController::class, 'store'])->name('produtos.store');
