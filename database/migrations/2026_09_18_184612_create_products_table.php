<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('identificacion', 50)->unique();
            $table->string('nombre', 150);
            $table->decimal('precio', 12, 2);
            $table->integer('stock')->default(0);
            $table->foreignId('id_categoria')->constrained('categories', 'id_categoria')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};