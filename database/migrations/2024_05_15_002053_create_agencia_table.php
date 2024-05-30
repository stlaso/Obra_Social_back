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
        Schema::create('agencia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('domicilio_trabajo')->nullable();
            $table->string('telefono_laboral')->nullable();
            $table->unsignedBigInteger('ugl_id')->nullable();
            $table->foreign('ugl_id')->references('id')->on('tipo_ugl');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agencia');
    }
};
