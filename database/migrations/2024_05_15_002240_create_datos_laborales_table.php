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
        Schema::create('datos_laborales', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_contrato')->nullable();
            $table->unsignedBigInteger('ugl_id')->nullable();
            $table->foreign('ugl_id')->references('id')->on('tipo_ugl');
            $table->unsignedBigInteger('agencia_id')->nullable();
            $table->foreign('agencia_id')->references('id')->on('agencia');
            $table->unsignedBigInteger('seccional_id')->nullable();
            $table->foreign('seccional_id')->references('id')->on('seccional');
            $table->string('agrupamiento')->nullable();
            $table->integer('tramo')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->integer('telefono_laboral')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('email')->nullable();
            $table->integer('telefono')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_laborales');
    }
};
