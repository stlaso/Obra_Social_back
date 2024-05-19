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
        Schema::create('documentacion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('archivo');
            $table->unsignedBigInteger('persona_id'); 
            $table->foreign('persona_id')->references('id')->on('persona');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentacion');
    }
};
