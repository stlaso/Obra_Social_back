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
            $table->integer('legajo')->unique();
            $table->date('fecha_afiliacion')->nullable();;
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('tipo_documento')->nullable();;
            $table->string('dni')->unique();
            $table->string('cuil', 20)->nullable();
            $table->string('email')->nullable();
            $table->integer('telefono')->nullable();
            $table->unsignedBigInteger('nacionalidad_id')->nullable();;
            $table->unsignedBigInteger('domicilio_id')->nullable();;
            $table->unsignedBigInteger('datos_laborales_id')->nullable();
            $table->unsignedBigInteger('obra_social_id')->nullable();
            $table->unsignedBigInteger('estados_id')->default(1);
            $table->unsignedBigInteger('estado_civil_id')->nullable();
            $table->unsignedBigInteger('sexo_id')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->foreign('datos_laborales_id')->references('id')->on('datos_laborales');
            $table->foreign('obra_social_id')->references('id')->on('obra_social');
            $table->foreign('domicilio_id')->references('id')->on('domicilio');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');
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
