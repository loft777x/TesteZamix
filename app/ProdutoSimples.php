<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoSimples extends Model
{
    protected $table = 'produto_simples';
    
    protected $fillable = [
        'nome', 
        'preco_custo',
        'preco_venda'
    ];
    
}