<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad');
            $table->decimal('precio_unt', 10, 2);
            $table->timestamps();

            $table->foreign('id_venta')
                  ->references('id_venta')
                  ->on('sales')
                  ->onDelete('cascade');

            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};