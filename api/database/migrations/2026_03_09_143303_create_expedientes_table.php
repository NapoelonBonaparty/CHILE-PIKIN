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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            // Relación estricta 1 a 1. Si borras al votante, se borra su expediente (cascade)
            $table->foreignId('votante_id')->unique()->constrained('votantes')->onDelete('cascade');
            
            $table->string('curp', 18)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 15)->nullable();
            $table->text('domicilio_completo')->nullable();
            
            // Aquí guardaremos la ruta donde se guardó la foto físicamente
            $table->string('foto_credencial')->nullable();
            $table->string('foto_personal')->nullable();
            
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
