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
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->string('estado_pago', 50)->default('pendiente');
            $table->timestamps();

            $table->foreign('id_cliente')
                  ->references('id_cliente')
                  ->on('clients')
                  ->onDelete('cascade');

            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};