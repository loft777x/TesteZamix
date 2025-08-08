@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Produto Composto</h1>
    <form method="POST" action="{{ route('produtos-compostos.store') }}">
        @csrf
        <div class="form-group">
            <label>Nome do Produto Composto</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <h3>Selecione os Produtos Simples</h3>
        @foreach($produtosSimples as $produto)
            <div class="form-check">
                <input type="checkbox" name="produtos_simples[]" value="{{ $produto->id }}" class="form-check-input">
                <label class="form-check-label">
                    {{ $produto->nome }} (R$ {{ number_format($produto->preco_venda, 2, ',', '.') }})
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</div>
@endsection