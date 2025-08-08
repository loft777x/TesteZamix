<?php

namespace App\Http\Controllers;

use App\ProdutoSimples;
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
            'nome' => 'string',
            'preco_custo' => 'numeric',
            'preco_venda' => 'numeric'
        ]);

        ProdutoSimples::create([
            'nome' => $request->nome,
            'preco_custo' => $request->preco_custo,
            'preco_venda' => $request->preco_venda
        ]);
    
        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoSimples $produtoSimples)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoSimples $produtoSimples)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdutoSimples  $produtoSimples
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoSimples $produtoSimples)
    {
        //
    }
}
