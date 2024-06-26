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
        Schema::create('familiares', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_familiar')->nullable();
            $table->date('fecha_nacimiento_familiar')->nullable();
            $table->string('tipo_documento_familiar')->nullable();
            $table->string('documento')->nullable();
            $table->unsignedBigInteger('parentesco_id');
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('parentesco_id')->references('id')->on('parentesco');
            $table->foreign('persona_id')->references('id')->on('persona');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familiares');
    }
};
