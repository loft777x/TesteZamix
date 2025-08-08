<?php

namespace App\Http\Controllers;

use App\ProdutoComposto;
use App\ProdutoSimples;
use Illuminate\Http\Request;

class ProdutoCompostoController extends Controller
{
    public function index()
    {
        $produtos = ProdutoComposto::with('itens.produtoSimples')->get();
        return view('produtos_compostos.index', compact('produtos')); // Nome da view corrigido
    }

    public function create()
    {
        $produtosSimples = ProdutoSimples::all();
        return view('produtos_compostos.create', compact('produtosSimples')); // Nome da view corrigido
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'produtos_simples' => 'required|array|min:1'
        ]);

        $produtoComposto = ProdutoComposto::create(['nome' => $request->nome]);

        foreach ($request->produtos_simples as $produtoId) {
            $produtoComposto->itens()->create(['produto_simples_id' => $produtoId]);
        }

        return redirect()->route('produtos-compostos.index')->with('success', 'Produto composto criado!');
    }
}