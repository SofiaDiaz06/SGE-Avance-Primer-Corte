<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        Provider::create(['nombre' => 'Distribuidora Escolar S.A.S.', 'telefono' => '6012345678']);
        Provider::create(['nombre' => 'Papelera Nacional', 'telefono' => '6023456789']);
        Provider::create(['nombre' => 'Importadora de Útiles Ltda.', 'telefono' => '6034567890']);
        Provider::create(['nombre' => 'Suministros del Norte', 'telefono' => '6045678901']);
        Provider::create(['nombre' => 'Mayorista El Lápiz', 'telefono' => '6056789012']);
        Provider::create(['nombre' => 'Comercializadora Grafos', 'telefono' => '6067890123']);
        Provider::create(['nombre' => 'Distribuciones Alpha', 'telefono' => '6078901234']);
        Provider::create(['nombre' => 'Papeles del Sur', 'telefono' => '6089012345']);
        Provider::create(['nombre' => 'Útiles y Más S.A.S.', 'telefono' => '6090123456']);
        Provider::create(['nombre' => 'Proveedora Central', 'telefono' => '6011234567']);
    }
}