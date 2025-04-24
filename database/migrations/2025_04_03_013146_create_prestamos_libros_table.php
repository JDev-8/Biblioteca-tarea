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
        Schema::create('prestamos_libros', function (Blueprint $table) {
            $table->id('prestamos_libros_id');
            $table->unsignedBigInteger('lector_id');
            $table->unsignedBigInteger('libro_id');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->string('estado');
            $table->unsignedBigInteger('usuario_bibliotecario_id');
            $table->string('renovaciones');
            $table->timestamps();

            $table->foreign('lector_id')->references('usuario_id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('libro_id')->references('libro_id')->on('libros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_bibliotecario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos_libros');
    }
};
