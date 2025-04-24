<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libros_x_autores', function (Blueprint $table) {
            $table->id('libro_x_autor_id');
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('autor_id');
            $table->timestamps();

            $table->foreign('libro_id')->references('libro_id')->on('libros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('autor_id')->references('autor_id')->on('autores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros_x_autores');
    }
};
