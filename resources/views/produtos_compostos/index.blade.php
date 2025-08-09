@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos Compostos</h1>
    <a href="{{ route('produtos-compostos.create') }}" class="btn btn-success mb-3">Novo Produto Composto</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço de Venda</th>
                <th>Produtos Simples</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                    <td>
                        <ul>
                            @foreach($produto->itens as $item)
                                <li>
                                    {{ $item->produtoSimples->nome }} 
                                    (Custo: R$ {{ number_format($item->produtoSimples->preco_custo, 2, ',', '.') }}, 
                                    Venda: R$ {{ number_format($item->produtoSimples->preco_venda, 2, ',', '.') }})
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection