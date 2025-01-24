<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargo')->insert([
            ['codigo' => 'DEP001', 'nombre' => 'Recursos Humanos', 'activo' => true, 'idUsuarioCreacion' => 0],
            ['codigo' => 'DEP002', 'nombre' => 'Finanzas', 'activo' => true, 'idUsuarioCreacion' => 1],
            ['codigo' => 'DEP003', 'nombre' => 'IT', 'activo' => true, 'idUsuarioCreacion' => 1],
        ]);
    }
}
