<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Client;
use App\Models\Provider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuarios (10 registros)
        User::create([
            'name' => 'Administrador Paraíso',
            'cedula' => '1001234567',
            'rol' => 'Administrador',
            'email' => 'admin@paraiso.com',
            'password' => Hash::make('password'),
        ]);

        for ($i = 2; $i <= 10; $i++) {
            User::create([
                'name' => "Empleado $i",
                'cedula' => "100123456$i",
                'rol' => 'Cajero',
                'email' => "cajero$i@paraiso.com",
                'password' => Hash::make('password'),
            ]);
        }

        // 2. Categorías (10 registros)
        $categoriasList = [
            ['nombre' => 'Cuadernos y Libretas', 'descripcion' => 'Cuadernos cosidos y argollados.'],
            ['nombre' => 'Útiles de Escritura', 'descripcion' => 'Esferos, lápices y marcadores.'],
            ['nombre' => 'Papel y Cartulinas', 'descripcion' => 'Resmas de papel y cartulinas.'],
            ['nombre' => 'Archivadores y Carpetas', 'descripcion' => 'Carpetas de fuelle, az y legajadores.'],
            ['nombre' => 'Cintas y Pegantes', 'descripcion' => 'Cintas adhesivas, colbón y silicona.'],
            ['nombre' => 'Escolares y Arte', 'descripcion' => 'Pinceles, temperas y plastilina.'],
            ['nombre' => 'Reglas y Geometría', 'descripcion' => 'Escuadras, transportadores y reglas.'],
            ['nombre' => 'Oficina y Computación', 'descripcion' => 'Grapadoras, perforadoras y resaltadores.'],
            ['nombre' => 'Textos y Libros', 'descripcion' => 'Diccionarios y cuentos.'],
            ['nombre' => 'Accesorios de Escritorio', 'descripcion' => 'Organizadores y porta clips.'],
        ];

        $catModels = [];
        foreach ($categoriasList as $cat) {
            $catModels[] = Category::create([
                'nombre' => $cat['nombre'],
                'descripcion' => $cat['descripcion'],
                'activo' => true
            ]);
        }

        // 3. Productos (10 registros)
        $productos = [
            ['identificacion' => 'P-001', 'nombre' => 'Cuaderno Argollado 100 Hojas', 'precio' => 8500, 'stock' => 50, 'id_categoria' => $catModels[0]->id_categoria],
            ['identificacion' => 'P-002', 'nombre' => 'Cuaderno Cosido 50 Hojas', 'precio' => 4200, 'stock' => 30, 'id_categoria' => $catModels[0]->id_categoria],
            ['identificacion' => 'P-003', 'nombre' => 'Esfero Negro', 'precio' => 1500, 'stock' => 120, 'id_categoria' => $catModels[1]->id_categoria],
            ['identificacion' => 'P-004', 'nombre' => 'Esfero Azul', 'precio' => 1500, 'stock' => 110, 'id_categoria' => $catModels[1]->id_categoria],
            ['identificacion' => 'P-005', 'nombre' => 'Lápiz Mirado N° 2', 'precio' => 1200, 'stock' => 80, 'id_categoria' => $catModels[1]->id_categoria],
            ['identificacion' => 'P-006', 'nombre' => 'Marcador Sharpie Negro', 'precio' => 4500, 'stock' => 25, 'id_categoria' => $catModels[1]->id_categoria],
            ['identificacion' => 'P-007', 'nombre' => 'Resma Papel Carta 75g', 'precio' => 18500, 'stock' => 40, 'id_categoria' => $catModels[2]->id_categoria],
            ['identificacion' => 'P-008', 'nombre' => 'Resma Papel Oficio 75g', 'precio' => 21000, 'stock' => 15, 'id_categoria' => $catModels[2]->id_categoria],
            ['identificacion' => 'P-009', 'nombre' => 'Block Cartulina Escolar x10', 'precio' => 6000, 'stock' => 8, 'id_categoria' => $catModels[2]->id_categoria],
            ['identificacion' => 'P-010', 'nombre' => 'Caja Colores x24', 'precio' => 24000, 'stock' => 18, 'id_categoria' => $catModels[1]->id_categoria],
        ];

        foreach ($productos as $prod) {
            Product::create($prod);
        }

        // 4. Clientes (10 registros)
        for ($i = 1; $i <= 10; $i++) {
            Client::create([
                'nombre' => "Cliente $i",
                'telefono' => "310000000$i",
                'ubicacion' => "Calle $i # $i - 10",
            ]);
        }

        // 5. Proveedores (10 registros)
        for ($i = 1; $i <= 10; $i++) {
            Provider::create([
                'nombre' => "Proveedor $i",
                'telefono' => "320000000$i",
            ]);
        }
    }
}