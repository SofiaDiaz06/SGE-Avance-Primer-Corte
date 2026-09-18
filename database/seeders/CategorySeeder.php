<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['nombre' => 'Papelería y Cuadernos', 'descripcion' => 'Cuadernos, bloques y papel bond', 'activo' => true]);
        Category::create(['nombre' => 'Escritura', 'descripcion' => 'Esferos, lápices, borradores y marcadores', 'activo' => true]);
        Category::create(['nombre' => 'Suministros de Oficina', 'descripcion' => 'Archivadores, grapadoras y ganchos', 'activo' => true]);
        Category::create(['nombre' => 'Geometría y Arte', 'descripcion' => 'Reglas, compases, pinceles y pinturas', 'activo' => true]);
        Category::create(['nombre' => 'Tecnología Escolar', 'descripcion' => 'Calculadoras y accesorios básicos', 'activo' => true]);
        Category::create(['nombre' => 'Mochilas y Morrales', 'descripcion' => 'Mochilas escolares y universitarias', 'activo' => true]);
        Category::create(['nombre' => 'Resmas y Papel', 'descripcion' => 'Resmas de papel bond y papel periódico', 'activo' => true]);
        Category::create(['nombre' => 'Adhesivos', 'descripcion' => 'Colbón, cinta adhesiva y silicona', 'activo' => true]);
        Category::create(['nombre' => 'Manualidades', 'descripcion' => 'Foamy, cartulinas y materiales decorativos', 'activo' => true]);
        Category::create(['nombre' => 'Libros y Textos', 'descripcion' => 'Libros escolares y de lectura', 'activo' => true]);
    }
}