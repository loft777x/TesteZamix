@extends('layouts.app')

@section('content')
<div class="container">
    <div class="product-header">
        <h1 class="company-name">Kaua</h1>
        <h2 class="page-title">Cadastrar Novo Produto</h2>
        <a href="{{ route('produtos.index') }}" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <div class="product-form-container">
        <form method="POST" action="{{ route('produtos.store') }}">
            @csrf
            
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="preco_custo">Preço de Custo (R$)</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="preco_custo" name="preco_custo" required>
                </div>

                <div class="form-group">
                    <label for="preco_venda">Preço de Venda (R$)</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="preco_venda" name="preco_venda" required>
                </div>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade em Estoque</label>
                <input type="number" min="0" class="form-control" id="quantidade" name="quantidade" required>
            </div>

            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save"></i> Cadastrar Produto
            </button>
        </form>
    </div>
</div>
@endsection