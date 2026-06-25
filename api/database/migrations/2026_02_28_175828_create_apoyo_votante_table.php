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
        Schema::create('apoyo_votante', function (Blueprint $table) {
            $table->id();
            
            // Relación con el Votante
            $table->foreignId('votante_id')->constrained('votantes')->onDelete('cascade');
            
            // Relación con el Apoyo
            $table->foreignId('apoyo_id')->constrained('apoyos')->onDelete('cascade');
            
            // Datos extra de la entrega
            $table->date('fecha_entrega')->nullable();
            $table->text('observaciones')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apoyo_votante');
    }
};
