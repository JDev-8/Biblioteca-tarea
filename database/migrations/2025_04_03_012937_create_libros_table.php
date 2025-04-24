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
        Schema::create('libros', function (Blueprint $table) {
           $table->id('libro_id');
            $table->string('titulo');
            $table->string('ISBN')->unique();
            $table->unsignedBigInteger('categoria_id');
            $table->date('fecha_publicacion');
            $table->string('editorial');
            $table->string('numero_copias');
            $table->string('disponibilidad');
            $table->string('imagen_portada');
            $table->text('resumen');
            $table->string('idioma');
            $table->string('edicion');
            $table->timestamps();

            $table->foreign('categoria_id')->references('categoria_id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
