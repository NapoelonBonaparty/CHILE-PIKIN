<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('casillas', function (Blueprint $table) {
            $table->id();
            // Conexión con la tabla secciones
            $table->foreignId('seccion_id')->constrained('secciones')->onDelete('cascade');
            
            // Datos de la casilla
            $table->string('nombre'); // "Básica", "Contigua 1", etc.
            $table->string('ubicacion_texto')->nullable(); // Ej. "Escuela Benito Juárez"
            
            // Coordenadas para el mapa (8 decimales de precisión)
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('casillas');
    }
};