<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'id_cliente',
        'id_usuario',
        'fecha',
        'total',
        'estado_pago',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cliente', 'id_cliente');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_details', 'id_venta', 'id_producto')
                    ->withPivot('id_info_venta', 'cantidad', 'precio_unt')
                    ->withTimestamps();
    }
}