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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 10)->unique(); // Ej. "1070"
            $table->json('casillas_disponibles'); // Arreglo ["Basica", "Contigua 1"]
            
            // ¡LAS COLUMNAS QUE FALTABAN DE LA IMAGEN!
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            
            // Los campos de los polígonos
            $table->json('poligono')->nullable(); 
            $table->json('barrios')->nullable();  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones'); 
    }
};