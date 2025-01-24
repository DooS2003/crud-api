<?php

namespace App\Models\user;

use App\Models\cargo\Cargo;
use App\Models\departamento\Departamento;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'usuario',
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'idDepartamento',
        'idCargo'
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'idDepartamento', 'id');
    }
    public function cargo(){
        return $this->belongsTo(Cargo::class, 'idCargo');
    }

    public function scopewhereDepartamento($query, $id){
        return $query->where('id', $id)->value('nombre');
    }
}
