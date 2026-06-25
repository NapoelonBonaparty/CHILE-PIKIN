<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('expedientes', function (Blueprint $table) {
            $table->dropColumn('domicilio_completo');

            $table->string('calle')->nullable()->after('genero');
            $table->string('numero', 50)->nullable()->after('calle');
            $table->string('colonia')->nullable()->after('numero');
            $table->string('referencias')->nullable()->after('colonia');
        });
    }

    public function down(): void
    {
        Schema::table('expedientes', function (Blueprint $table) {

            $table->dropColumn(['calle', 'numero', 'colonia', 'referencias']);
            $table->string('domicilio_completo')->nullable();
        });
    }
};