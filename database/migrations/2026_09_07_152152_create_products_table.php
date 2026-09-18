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
            $table->string('identificacion');
            $table->string('nombre');
            $table->decimal('precio', 10, 2);
            $table->integer('stock');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();

            $table->foreign('id_categoria')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};