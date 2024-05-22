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
            $table->string('nombre')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->integer('documento')->nullable();
            $table->unsignedBigInteger('persona_id');
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
