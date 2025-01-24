<?php

namespace App\Models\cargo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'cargo';
    protected $fillable=[
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion',
    ];
}
