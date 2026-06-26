<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Gestor',
            'email' => 'gestor@associacao.com.br',
            'password' => bcrypt('senha123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Leiturista',
            'email' => 'leiturista@associacao.com.br',
            'password' => bcrypt('senha123'),
            'role' => 'leiturista',
        ]);
    }
}
