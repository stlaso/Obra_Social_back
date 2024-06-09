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
            $table->unsignedBigInteger('tipo_contrato_id');
            $table->unsignedBigInteger('agencia_id')->nullable();
            $table->unsignedBigInteger('seccional_id')->nullable();
            $table->unsignedBigInteger('agrupamiento_id');
            $table->unsignedBigInteger('tramo_id');
            $table->string('carga_horaria')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('email_laboral')->nullable();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('tramo_id')->references('id')->on('tramo');
            $table->foreign('seccional_id')->references('id')->on('seccional');
            $table->foreign('agencia_id')->references('id')->on('agencia');
            $table->foreign('agrupamiento_id')->references('id')->on('agrupamiento');
            $table->foreign('tipo_contrato_id')->references('id')->on('tipo_contrato');
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
