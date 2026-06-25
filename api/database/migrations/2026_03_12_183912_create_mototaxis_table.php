<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mototaxis', function (Blueprint $table) {
            $table->id();
            
            // Este es el hilo que lo conecta con el Padrón Maestro
            $table->foreignId('votante_id')->constrained('votantes')->onDelete('cascade');
            
            // Datos exclusivos del gremio
            $table->string('numero_economico')->nullable();
            $table->string('grupo')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mototaxis');
    }
};