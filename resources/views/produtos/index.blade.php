@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos Simples</h1>

    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Novo Produto</a>

