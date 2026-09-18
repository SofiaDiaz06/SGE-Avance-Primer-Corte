<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'identificacion',
        'nombre',
        'precio',
        'stock',
        'id_categoria',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id_categoria');
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_details', 'id_producto', 'id_venta')
                    ->withPivot('id_info_venta', 'cantidad', 'precio_unt')
                    ->withTimestamps();
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'purchase_details', 'id_producto', 'id_compra')
                    ->withPivot('id_info_compra', 'cantidad', 'precio_unt')
                    ->withTimestamps();
    }

    public function scopeConStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeStockBajo($query)
    {
        return $query->where('stock', '<', 10);
    }
}