<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoComposto extends Model
{
    protected $table = 'produto_composto';
    protected $fillable = ['nome'];

    public function itens()
    {
        return $this->hasMany('App\ProdutoCompostoItem', 'produto_composto_id');
    }

    // Calcula o preço de venda somando os preços dos produtos simples
    public function getPrecoVendaAttribute()
    {
        return $this->itens->sum(function ($item) {
            return $item->produtoSimples->preco_venda;
        });
    }
}