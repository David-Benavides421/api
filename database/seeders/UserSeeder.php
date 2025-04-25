<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Importa el modelo User
use Illuminate\Support\Facades\Hash; // Importa Hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario Administrador
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('contraseña123'),
            'role' => 'admin',
            'email_verified_at' => now()
        ]);

        // Crear usuario Normal
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('contraseña123'),
            'role' => 'user', // O puedes omitirlo para usar el default
            'email_verified_at' => now()
        ]);

         // Puedes crear más usuarios aquí si lo necesitas
         User::factory(10)->create(); // Crea 10 usuarios de prueba con Factory (rol 'user' por defecto)

    }
}
