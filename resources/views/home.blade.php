@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem vindo!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Selecione o campo que deseja acessar!
                </div>
            </div>
            <nav class=navbar_produtos> 
                    <a href="/produtos/produtos_simples">Produtos Simples</a>
                    <a href="/produtos/produtos_compostos">Produtos Compostos</a>
            </nav
        </div>
    </div>
</div>
@endsection
