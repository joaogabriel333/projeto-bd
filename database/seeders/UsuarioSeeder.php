<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 100; $i++){
        Usuario::create([
            'nome' => 'Gabriel'.$i,
            'cpf' => rand (00000000001, 33333333333),
            'email' => 'gabriel'.$i.'@sp.senai.br',
            'password' => Hash::make('333333'),
        ]);
      }
    }
}
