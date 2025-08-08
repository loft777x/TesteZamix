<?php

namespace App\Http\Controllers;

use App\Models\ProdutoSimples;
use App\Models\ProductHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoSimplesController extends Controller
{
    public function index()
    {
        $produtos = ProdutoSimples::with('historico')->get(); // Carregar histórico junto
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco_custo' => 'required|numeric|min:0',
            'preco_venda' => 'required|numeric|gte:preco_custo', // Preço venda >= custo
            'quantidade' => 'required|integer|min:0'
        ]);

        $produto = ProdutoSimples::create($validated);

        ProductHistory::create([
            'product_id' => $produto->id,
            'user_id' => Auth::id(),
            'previous_quantity' => 0,
            'new_quantity' => $produto->quantidade,
            'action' => ProductHistory::ACTION_CREATE
        ]);

        return redirect()->route('produtos.index')
                       ->with('success', 'Produto cadastrado com sucesso!');
    }

    public function show(ProdutoSimples $produtoSimples)
    {
        $historico = $produtoSimples->historico()->with('user')->latest()->get();
        return view('produtos.show', compact('produtoSimples', 'historico'));
    }

    public function edit(ProdutoSimples $produtoSimples)
    {
        return view('produtos.edit', compact('produtoSimples'));
    }

    public function update(Request $request, ProdutoSimples $produtoSimples)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco_custo' => 'required|numeric|min:0',
            'preco_venda' => 'required|numeric|gte:preco_custo',
            'quantidade' => 'required|integer|min:0'
        ]);

        $previousQuantity = $produtoSimples->quantidade;
        
        $produtoSimples->update($validated);

        ProductHistory::create([
            'product_id' => $produtoSimples->id,
            'user_id' => Auth::id(),
            'previous_quantity' => $previousQuantity,
            'new_quantity' => $produtoSimples->quantidade,
            'action' => ProductHistory::ACTION_UPDATE
        ]);

        return redirect()->route('produtos.index')
                       ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(ProdutoSimples $produtoSimples)
    {
        ProductHistory::create([
            'product_id' => $produtoSimples->id,
            'user_id' => Auth::id(),
            'previous_quantity' => $produtoSimples->quantidade,
            'new_quantity' => 0,
            'action' => ProductHistory::ACTION_DELETE
        ]);

        $produtoSimples->delete();

        return redirect()->route('produtos.index')
                       ->with('success', 'Produto removido com sucesso!');
    }

    // Método para relatório completo
    public function relatorio()
    {
        $historico = ProductHistory::with(['product', 'user'])
                     ->orderByDesc('created_at')
                     ->paginate(20);

        return view('produtos.relatorio', compact('historico'));
    }
}