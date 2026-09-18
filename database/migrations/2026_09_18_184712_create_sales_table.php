<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id('id_venta');
            $table->foreignId('id_cliente')->constrained('clients', 'id_cliente')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('users', 'id')->onDelete('cascade');
            $table->dateTime('fecha');
            $table->decimal('total', 12, 2);
            $table->string('estado_pago', 50)->default('Pagado');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};