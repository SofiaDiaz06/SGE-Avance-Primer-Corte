<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre',
        'telefono',
        'ubicacion',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class, 'id_cliente', 'id_cliente');
    }
}