@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $produto->nome }}</h1>
    <h3>Preço Total: R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</h3>

    <h4>Itens que compõem este produto:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço Custo</th>
                <th>Preço Venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produto->itens as $item)
            <tr>
                <td>{{ $item->nome }}</td>
                <td>R$ {{ number_format($item->preco_custo, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($item->preco_venda, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
