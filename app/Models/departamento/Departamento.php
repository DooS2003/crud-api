<?php

namespace App\Models\departamento;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'departamento';
    protected $fillable=[
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion',
    ];
}
