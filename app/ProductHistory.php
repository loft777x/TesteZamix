<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    protected $table = 'product_history';
    
    protected $fillable = [
        'product_id', 
        'user_id',
        'previous_quantity',
        'new_quantity',
        'action'
    ];

    const ACTION_CREATE = 'create';
    const ACTION_UPDATE = 'update';
    const ACTION_DELETE = 'delete';

    public function product()
    {
        return $this->belongsTo(ProdutoSimples::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}