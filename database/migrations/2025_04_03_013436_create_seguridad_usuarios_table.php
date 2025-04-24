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
        Schema::create('seguridad_usuarios', function (Blueprint $table) {
            $table->id('seguridad_usuario_id');
            $table->unsignedBigInteger('usuario_id');
            $table->string('primera_pregunta_seguridad');
            $table->string('respuesta_primera_pregunta_seguridad');
            $table->string('segunda_pregunta_seguridad');
            $table->string('respuesta_segunda_pregunta_seguridad');
            $table->timestamps();

            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguridad_usuarios');
    }
};
