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
        Schema::create('votantes', function (Blueprint $table) {
            $table->id();
        
            $table->string('clave_elector')->nullable()->unique(); 
            
            $table->string('nombre');

            $table->string('direccion')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable(); 
            
            $table->string('seccion', 10);
            $table->string('casilla', 50)->nullable();
            $table->text('foto_url')->nullable(); 
            $table->enum('simpatia', ['a_favor', 'en_contra', 'indeciso', 'no_visitado'])->default('no_visitado');
            
            $table->string('foto_evidencia')->nullable();
            $table->string('observaciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votantes');
    }
};