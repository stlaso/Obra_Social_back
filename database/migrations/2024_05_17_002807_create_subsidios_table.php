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
        Schema::create('subsidios', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_subsidio')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_otorgamiento')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('subsidios');
    }
};
