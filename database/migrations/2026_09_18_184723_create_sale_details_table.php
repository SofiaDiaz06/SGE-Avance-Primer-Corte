<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id('id_info_venta');
            $table->foreignId('id_venta')->constrained('sales', 'id_venta')->onDelete('cascade');
            $table->foreignId('id_producto')->constrained('products', 'id_producto')->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio_unt', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_details');
    }
};