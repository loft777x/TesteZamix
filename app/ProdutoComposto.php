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

    public function getPrecoVendaAttribute()
    {
        return $this->itens->sum(function ($item) {
            return $item->produtoSimples->preco_venda;
        });
    }
}