<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoSimples extends Model
{
    protected $table = 'produto_simples'; // Nome da tabela no banco
    protected $fillable = ['nome', 'descricao', 'preco']; // Campos que podem ser preenchidos
}
