<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('votantes', function (Blueprint $table) {
            // 1. Agregamos la nueva columna (nullable porque es opcional)
            $table->string('asociacion')->nullable()->after('casilla');
            
            // 2. Modificamos la columna casilla para que acepte nulos
            $table->string('casilla')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('votantes', function (Blueprint $table) {
            $table->dropColumn('asociacion');
            $table->string('casilla')->nullable(false)->change();
        });
    }
};