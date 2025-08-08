<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProdutoSimples extends Model
{
    protected $table = 'produto_simples';
    
    protected $fillable = [
        'nome',
        'preco_custo',
        'preco_venda',
        'quantidade'
    ];

    // Correção: Definir corretamente a relação com ProductHistory
    public function historico(): HasMany
    {
        return $this->hasMany(ProductHistory::class, 'product_id');
    }

    // Correção: Definir corretamente a relação com ProdutoComposto
    public function composicaoProdutos(): BelongsToMany 
    {
        return $this->belongsToMany(
            ProdutoComposto::class, 
            'produto_composto_itens', 
            'produto_simples_id', 
            'produto_composto_id'
        );
    }
}