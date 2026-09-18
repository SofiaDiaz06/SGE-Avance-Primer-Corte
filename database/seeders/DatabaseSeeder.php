<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuario administrador de prueba
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@paraiso.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Seeders del ERP, en orden correcto
        $this->call([
            CategorySeeder::class,
            ClientSeeder::class,
            ProviderSeeder::class,
            ProductSeeder::class,
            SaleSeeder::class,
            PurchaseSeeder::class,
        ]);
    }
}