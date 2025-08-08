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

        <div class="form-group">
            <label>Selecione os Produtos Simples</label>
            <select name="produtos_simples[]" class="form-control select2" multiple required>
                @foreach($produtosSimples as $produto)
                <option value="{{ $produto->id }}">
                    {{ $produto->nome }} (R$ {{ number_format($produto->preco_venda, 2, ',', '.') }})
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Salvar
        </button>
    </form>
</div>

<!-- Adicione o Select2 para seleção múltipla -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection