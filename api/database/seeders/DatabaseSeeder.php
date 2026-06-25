<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@delta.com'],
            [
                'name' => 'Daniel Guzman',
                'username' => 'admin', 
                'password' => bcrypt('wadmin'),
                
                'rol' => 'superadmin', 
                'seccion' => null,     
                'casilla' => null      
            ]
        );

        $this->call([
            VotanteSeeder::class,
        ]);
    }
}