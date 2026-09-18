<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'id_venta';

    protected $fillable = [
        'id_cliente',
        'id_usuario',
        'fecha',
        'total',
        'estado_pago',
    ];

    // Relación: Sale pertenece a Client
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_cliente');
    }

    // Relación: Sale pertenece a User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    // Relación N:M con Product a través de sale_details
    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_details', 'id_venta', 'id_producto')
                    ->withPivot('cantidad', 'precio_unt')
                    ->withTimestamps();
    }
}