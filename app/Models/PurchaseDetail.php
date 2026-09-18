<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
        'id_compra',
        'id_producto',
        'cantidad',
        'precio_unt',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'id_compra');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_producto');
    }
}
