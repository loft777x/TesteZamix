<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoCompostoItem extends Model
{
    protected $table = 'produto_composto_itens';
    public $timestamps = false; // Se você removeu os timestamps
    
    protected $fillable = ['produto_composto_id', 'produto_simples_id'];
    
    // Corrigindo o nome da relação (deve ser igual ao chamado no código)
    public function produtoSimples() // Nome exato usado nas views
    {
        return $this->belongsTo(ProdutoSimples::class, 'produto_simples_id');
    }
}