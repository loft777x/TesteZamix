<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoCompostoItem extends Model
{
    protected $table = 'produto_composto_itens';
    public $timestamps = false;
    
    protected $fillable = ['produto_composto_id', 'produto_simples_id'];
    
    public function produtoSimples()
    {
        return $this->belongsTo(ProdutoSimples::class, 'produto_simples_id');
    }
}