<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Client;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos clientes y productos ya existentes
        $clients = Client::all();
        $products = \App\Models\Product::all();

        // Creamos 10 ventas de prueba
        for ($i = 0; $i < 10; $i++) {
            $sale = Sale::create([
                'id_cliente' => $clients->random()->id_cliente,
                'fecha' => now()->subDays(rand(1, 30))->format('Y-m-d'),
                'total' => rand(10000, 100000),
                'estado_pago' => ['pagado', 'pendiente', 'anulado'][rand(0, 2)],
            ]);

            // Asociar 1 a 3 productos a cada venta
            $randomProducts = $products->random(rand(1, 3));
            foreach ($randomProducts as $product) {
                $sale->products()->attach($product->id_producto, [
                    'cantidad' => rand(1, 5),
                    'precio_unt' => $product->precio,
                ]);
            }
        }
    }
}
