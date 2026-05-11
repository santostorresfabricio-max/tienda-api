<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $primaryKey = 'id_alumno'; // Clave primaria PERSONALIZADA
    protected $fillable = [ // Campos que se pueden asignar masivamente
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'dni',
        'direccion',
        'telefono',
        'email',
        'estado_matricula',
    ];


    public function matriculas() // Relación uno a muchos con Matricula
    {
        return $this->hasMany(Matricula::class, 'id_alumno', 'id_alumno');  
    }
}
