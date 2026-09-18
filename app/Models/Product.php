<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'identificacion',
        'nombre',
        'precio',
        'stock',
        'id_categoria',
    ];

    // Relación: Product pertenece a Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id');
    }

    // Relación N:M con Sale a través de sale_details
    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'sale_details', 'id_producto', 'id_venta')
                    ->withPivot('cantidad', 'precio_unt')
                    ->withTimestamps();
    }

    // Relación N:M con Purchase a través de purchase_details
    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'purchase_details', 'id_producto', 'id_compra')
                    ->withPivot('cantidad', 'precio_unt')
                    ->withTimestamps();
    }

    /**
     * Scope: solo productos con stock disponible (mayor a 0).
     */
    public function scopeConStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    /**
     * Scope: solo productos con stock bajo (menos de 10 unidades).
     */
    public function scopeStockBajo($query)
    {
        return $query->where('stock', '<', 10);
    }
}