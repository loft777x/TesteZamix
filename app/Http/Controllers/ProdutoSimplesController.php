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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
