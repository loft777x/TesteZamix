@extends('layouts.app')

@section('content')
<div class="container">
    <div class="product-header">
        <h1>Produtos Compostos</h1>
        <a href="{{ route('produtos-compostos.create') }}" class="btn btn-add">
            <i class="fas fa-plus"></i> Novo Produto Composto
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço Venda</th>
                <th>Itens</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                <td>{{ $produto->itens->count() }} itens</td>
                <td>
                    <a href="{{ route('produtos-compostos.show', $produto->id) }}" class="btn btn-info">
                        <i class="fas fa-eye"></i> Detalhes
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection