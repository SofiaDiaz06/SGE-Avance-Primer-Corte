<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Purchase;
use App\Models\Provider;
use App\Models\Product;

class PurchaseSeeder extends Seeder
{
    public function run(): void
    {
        $providers = Provider::all();
        $products = Product::all();

        // Creamos 10 compras de prueba
        for ($i = 0; $i < 10; $i++) {
            $purchase = Purchase::create([
                'id_proveedor' => $providers->random()->id_proveedor,
                'fecha' => now()->subDays(rand(1, 30))->format('Y-m-d'),
                'total' => rand(50000, 500000),
            ]);

            // Asociar 1 a 3 productos a cada compra
            $randomProducts = $products->random(rand(1, 3));
            foreach ($randomProducts as $product) {
                $purchase->products()->attach($product->id_producto, [
                    'cantidad' => rand(5, 50),
                    'precio_unt' => $product->precio * 0.7, // Precio de compra (70% del de venta)
                ]);
            }
        }
    }
}