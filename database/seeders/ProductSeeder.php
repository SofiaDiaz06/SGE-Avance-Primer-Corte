<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['identificacion' => 'P1', 'nombre' => 'Cuaderno Argollado 5 Materias', 'precio' => 12500, 'stock' => 50, 'id_categoria' => 1]);
        Product::create(['identificacion' => 'P2', 'nombre' => 'Lápiz Mirado No. 2', 'precio' => 1500, 'stock' => 200, 'id_categoria' => 2]);
        Product::create(['identificacion' => 'P3', 'nombre' => 'Lapicero Negro', 'precio' => 1200, 'stock' => 150, 'id_categoria' => 2]);
        Product::create(['identificacion' => 'P4', 'nombre' => 'Carpeta de Cartón Legajador', 'precio' => 2500, 'stock' => 80, 'id_categoria' => 3]);
        Product::create(['identificacion' => 'P5', 'nombre' => 'Juego Geometría', 'precio' => 6000, 'stock' => 40, 'id_categoria' => 4]);
        Product::create(['identificacion' => 'P6', 'nombre' => 'Mochila Escolar Reforzada', 'precio' => 45000, 'stock' => 25, 'id_categoria' => 6]);
        Product::create(['identificacion' => 'P7', 'nombre' => 'Resma Papel Bond Carta', 'precio' => 18000, 'stock' => 60, 'id_categoria' => 7]);
        Product::create(['identificacion' => 'P8', 'nombre' => 'Colbón 250 ml', 'precio' => 3500, 'stock' => 100, 'id_categoria' => 8]);
        Product::create(['identificacion' => 'P9', 'nombre' => 'Cartulina Escolar Blanca', 'precio' => 800, 'stock' => 300, 'id_categoria' => 9]);
        Product::create(['identificacion' => 'P10', 'nombre' => 'Libro de Matemáticas Grado 5', 'precio' => 35000, 'stock' => 20, 'id_categoria' => 10]);
    }
}