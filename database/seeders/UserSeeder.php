<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Tony Stark',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'active' => 1,
            'num_id' => 1234,
            'password' => Hash::make('admin'),
            'role' => 1     #1-> Administrador, 2-> Profesor, 3-> Estudiante
        ]);

        User::create([
            'name' => 'Bruce Banner',
            'email' => 'profesor@gmail.com',
            'username' => 'profesor',
            'active' => 1,
            'num_id' => 5678,
            'password' => Hash::make('profesor'),
            'role' => 2     #1-> Administrador, 2-> Profesor, 3-> Estudiante
        ]);

        User::create([
            'name' => 'Peter Parker',
            'email' => 'estudiante@gmail.com',
            'username' => 'estudiante',
            'active' => 1,
            'num_id' => 1212,
            'password' => Hash::make('estudiante'),
            'role' => 3     #1-> Administrador, 2-> Profesor, 3-> Estudiante
        ]);
    }
}
