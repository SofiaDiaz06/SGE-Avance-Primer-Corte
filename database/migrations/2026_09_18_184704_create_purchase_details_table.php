<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id('id_info_compra');
            $table->foreignId('id_compra')->constrained('purchases', 'id_compra')->onDelete('cascade');
            $table->foreignId('id_producto')->constrained('products', 'id_producto')->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio_unt', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};