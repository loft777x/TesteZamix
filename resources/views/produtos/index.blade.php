@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Products</h1>
        <div class="d-flex align-items-center">
            <span class="text-muted me-2">Laravel</span>
            <span>Kauã</span>
        </div>
    </div>

    @foreach($produtos as $produto)
        <p>{{ $produto->nome }}</p>
    @endforeach
</div>
@endsection