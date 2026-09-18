<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'id_compra';

    protected $fillable = [
        'id_proveedor',
        'fecha',
        'total',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_proveedor');
    }

    // Relación N:M con Product a través de purchase_details
    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchase_details', 'id_compra', 'id_producto')
                    ->withPivot('cantidad', 'precio_unt')
                    ->withTimestamps();
    }
}