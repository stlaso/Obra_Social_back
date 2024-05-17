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
        Schema::create('tipo_contrato', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_contrato');
            $table->unsignedBigInteger('ugl_id');
            $table->foreign('ugl_id')->references('id')->on('tipo_ugl');
            $table->unsignedBigInteger('agencia_id');
            $table->foreign('agencia_id')->references('id')->on('agencia');
            $table->unsignedBigInteger('seccional_id');
            $table->foreign('seccional_id')->references('id')->on('seccional');
            $table->string('agrupamiento');
            $table->integer('tramo');
            $table->string('carga_horaria');
            $table->integer('telefono_laboral');
            $table->date('fecha_ingreso');
            $table->string('email');
            $table->integer('telefono');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_contrato');
    }
};
