@extends('layouts.app')

@section('content')
<div class="container">
    <div class="product-header">
        <h1 class="product-title">Lista de Produtos Simples</h1>
        <a href="{{ route('produtos.create') }}" class="btn btn-add">
            <i class="fas fa-plus"></i> Novo Produto Simples
        </a>
    </div>

    <div class="product-table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço Custo</th>
                    <th>Preço Venda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td class="price">R$ {{ number_format($produto->preco_custo, 2, ',', '.') }}</td>
                    <td class="price">R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection