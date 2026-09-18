<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::create(['identificacion' => '1023456789', 'nombre' => 'Juan Pérez', 'telefono' => '3101234567', 'ubicacion' => 'Calle 10 # 5-23']);
        Client::create(['identificacion' => '900123456-1', 'nombre' => 'Papelería Central S.A.S.', 'telefono' => '8324455', 'ubicacion' => 'Carrera 5 # 12-45']);
        Client::create(['identificacion' => '1098765432', 'nombre' => 'María Gómez', 'telefono' => '3209876543', 'ubicacion' => 'Avenida Bolívar # 20-15']);
        Client::create(['identificacion' => '800987654-2', 'nombre' => 'Colegio San José', 'telefono' => '7412589', 'ubicacion' => 'Calle 25 # 8-30']);
        Client::create(['identificacion' => '1045678912', 'nombre' => 'Carlos Ruíz', 'telefono' => '3156781234', 'ubicacion' => 'Manzana B Casa 4']);
        Client::create(['identificacion' => '1034567891', 'nombre' => 'Colegio La Esperanza', 'telefono' => '6321458', 'ubicacion' => 'Calle 30 # 15-22']);
        Client::create(['identificacion' => '1056789123', 'nombre' => 'Papelería El Lápiz', 'telefono' => '3157894561', 'ubicacion' => 'Carrera 8 # 20-10']);
        Client::create(['identificacion' => '1043215678', 'nombre' => 'Andrea Martínez', 'telefono' => '3204567891', 'ubicacion' => 'Calle 45 # 12-08']);
        Client::create(['identificacion' => '900456123-3', 'nombre' => 'Oficinas Global S.A.S.', 'telefono' => '7456321', 'ubicacion' => 'Avenida 68 # 22-15']);
        Client::create(['identificacion' => '1067891234', 'nombre' => 'Pedro Sánchez', 'telefono' => '3107894561', 'ubicacion' => 'Diagonal 15 # 8-40']);
    }
}