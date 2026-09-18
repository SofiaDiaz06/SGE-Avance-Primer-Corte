<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id('id_compra');
            $table->unsignedBigInteger('id_proveedor');
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('id_proveedor')
                  ->references('id_proveedor')
                  ->on('providers')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};