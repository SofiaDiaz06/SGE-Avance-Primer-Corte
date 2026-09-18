<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $fillable = [
        'id_venta',
        'id_producto',
        'cantidad',
        'precio_unt',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'id_venta');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_producto');
    }
}