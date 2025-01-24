<?php

namespace Database\Seeders;

use App\Models\cargo\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::create([
            'codigo' => 'MON-1112',
            'nombre' => 'CONTABILIDAD',
            'activo' => true,
            'idUsuarioCreacion' => null
        ]);
    }
}
