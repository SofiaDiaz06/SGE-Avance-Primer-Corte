<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_compra';

    protected $fillable = [
        'id_proveedor',
        'id_usuario',
        'fecha',
        'total',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_proveedor', 'id_proveedor');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchase_details', 'id_compra', 'id_producto')
                    ->withPivot('id_info_compra', 'cantidad', 'precio_unt')
                    ->withTimestamps();
    }
}