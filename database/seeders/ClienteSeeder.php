<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create(['Nombre' => 'Carlos Pérez', 'Telefono' => '3111234567']);
        Cliente::create(['Nombre' => 'Ana María Gómez', 'Telefono' => '3209876543']);
        Cliente::create(['Nombre' => 'Luis Fernando Rojas', 'Telefono' => '3154567890']);
        Cliente::create(['Nombre' => 'Diana Marcela Torres', 'Telefono' => '3007654321']);
        Cliente::create(['Nombre' => 'Jorge Iván Ospina', 'Telefono' => '3183332211']);
    }
}