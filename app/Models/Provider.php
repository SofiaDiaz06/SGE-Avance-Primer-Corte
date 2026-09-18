<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'nombre',
        'telefono',
    ];

    // Relación: Provider tiene muchas Purchases
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'id_proveedor');
    }
}