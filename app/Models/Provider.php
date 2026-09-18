<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'nombre',
        'telefono',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'id_proveedor', 'id_proveedor');
    }
}