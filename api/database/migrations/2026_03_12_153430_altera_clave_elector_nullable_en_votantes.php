<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('votantes', function (Blueprint $table) {
            // Le decimos que acepte nulos
            $table->string('clave_elector')->nullable()->change();
            // Por si acaso, aseguramos que la lat y lng también puedan ser nulas
            $table->string('latitud')->nullable()->change();
            $table->string('longitud')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('votantes', function (Blueprint $table) {
            $table->string('clave_elector')->nullable(false)->change();
        });
    }
};