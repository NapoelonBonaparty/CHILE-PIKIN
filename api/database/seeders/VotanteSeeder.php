<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Votante;
use Faker\Factory as Faker;

class VotanteSeeder extends Seeder
{
    public function run(): void
    {
        // Le decimos a Faker que genere datos con formato de México
        $faker = Faker::create('es_MX'); 

        $simpatias = ['a_favor', 'en_contra', 'indeciso', 'no_visitado'];
        $casillas = ['Básica', 'Contigua 1', 'Contigua 2', 'Contigua 3', 'Extraordinaria'];

        // Vamos a crear 50 votantes de prueba
        for ($i = 0; $i < 50; $i++) {
            Votante::create([
                // Generamos una clave falsa de 18 caracteres (letras y números)
                'clave_elector' => strtoupper($faker->bothify('????######????####')),
                // Guardamos el nombre en mayúsculas como en el INE
                'nombre' => strtoupper($faker->name()),
                // Simulamos una sección (ej. 1070, 1071)
                'seccion' => (string) $faker->numberBetween(1070, 1071), 
                'casilla' => $faker->randomElement($casillas),
                'foto_url' => null,
                'simpatia' => $faker->randomElement($simpatias),
            ]);
        }
    }
}