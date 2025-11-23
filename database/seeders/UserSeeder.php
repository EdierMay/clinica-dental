<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario ADMIN
        User::create([
            'name' => 'Admin Principal',
            'email' => 'admin@clinica.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'active' => true,
        ]);

        // Usuario STAFF
        User::create([
            'name' => 'Empleado Staff',
            'email' => 'staff@clinica.com',
            'password' => Hash::make('staff123'),
            'role' => 'staff',
            'active' => true,
        ]);

        // Usuario CLIENTE/PACIENTE
        User::create([
            'name' => 'Juan Paciente',
            'email' => 'paciente@clinica.com',
            'password' => Hash::make('paciente123'),
            'role' => 'client',
            'active' => true,
        ]);
    }
}
