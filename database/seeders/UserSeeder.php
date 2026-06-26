<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'gestor@associacao.com.br'],
            [
                'name' => 'Gestor',
                'password' => bcrypt('senha123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'leiturista@associacao.com.br'],
            [
                'name' => 'Leiturista',
                'password' => bcrypt('senha123'),
                'role' => 'leiturista',
            ]
        );
    }
}
