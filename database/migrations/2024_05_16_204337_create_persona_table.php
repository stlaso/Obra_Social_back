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
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->integer('legajo');
            $table->date('fecha_afiliacion');
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('sexo');
            $table->date('fecha_nacimiento');
            $table->integer('estado_civil');
            $table->string('tipo_documento');
            $table->integer('dni');
            $table->integer('cuil');
            $table->string('email');
            $table->integer('caracteristica_telefono');
            $table->integer('telefono');
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad'); 
            $table->unsignedBigInteger('domicilio_id'); 
            $table->foreign('domicilio_id')->references('id')->on('domicilio');
            $table->unsignedBigInteger('datos_laborales_id'); 
            $table->foreign('datos_laborales_id')->references('id')->on('datos_laborales');
            $table->unsignedBigInteger('obra_social_id'); 
            $table->foreign('obra_social_id')->references('id')->on('obra_social');
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
