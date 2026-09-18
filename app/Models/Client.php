<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'identificacion',
        'nombre',
        'telefono',
        'ubicacion',
    ];

    // Relación: Client tiene muchas Sales
    public function sales()
    {
        return $this->hasMany(Sale::class, 'id_cliente');
    }
}