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
            $table->integer('sexo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('estado_civil')->nullable();
            $table->string('tipo_documento');
            $table->integer('dni')->unique();
            $table->integer('cuil')->nullable();
            $table->string('email')->nullable();
            $table->integer('caracteristica_telefono')->nullable();
            $table->integer('telefono')->nullable();
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad'); 
            $table->unsignedBigInteger('domicilio_id'); 
            $table->foreign('domicilio_id')->references('id')->on('domicilio');
            $table->unsignedBigInteger('datos_laborales_id')->nullable(); 
            $table->foreign('datos_laborales_id')->references('id')->on('datos_laborales');
            $table->unsignedBigInteger('obra_social_id')->nullable(); 
            $table->foreign('obra_social_id')->references('id')->on('obra_social');
            $table->unsignedBigInteger('estados_id');
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->softDeletes();
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
