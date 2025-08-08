<?php

namespace App\Http\Controllers;

use App\ProdutoSimples;
use App\ProductHistory; // Adicione esta linha
use Illuminate\Http\Request;

class ProdutoSimplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = ProdutoSimples::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco_custo' => 'required|numeric|min:0',
            'preco_venda' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0'
        ]);

        $produto = ProdutoSimples::create($request->all());

        // Registrar no histórico
        ProductHistory::create([
            'product_id' => $produto->id,
            'user_id' => auth()->id(),
            'previous_quantity' => 0,
            'new_quantity' => $produto->quantidade,
            'action' => 'create'
        ]);

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoSimples $produtoSimples)
    {
        return view('produtos.show', compact('produtoSimples'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoSimples $produtoSimples)
    {
        return view('produtos.edit', compact('produtoSimples'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoSimples $produtoSimples)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco_custo' => 'required|numeric|min:0',
            'preco_venda' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0'
        ]);

        $previousQuantity = $produtoSimples->quantidade;
        
        $produtoSimples->update($request->all());

        // Registrar no histórico
        ProductHistory::create([
            'product_id' => $produtoSimples->id,
            'user_id' => auth()->id(),
            'previous_quantity' => $previousQuantity,
            'new_quantity' => $produtoSimples->quantidade,
            'action' => 'update'
        ]);

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoSimples $produtoSimples)
    {
        // Registrar no histórico antes de deletar
        ProductHistory::create([
            'product_id' => $produtoSimples->id,
            'user_id' => auth()->id(),
            'previous_quantity' => $produtoSimples->quantidade,
            'new_quantity' => 0,
            'action' => 'delete'
        ]);

        $produtoSimples->delete();

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto removido com sucesso!');
    }

    /**
     * Mostrar o histórico de alterações do produto
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function history(ProdutoSimples $produtoSimples)
    {
        $history = ProductHistory::where('product_id', $produtoSimples->id)
                    ->with('user')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('produtos.history', compact('produtoSimples', 'history'));
    }
}