<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $primaryKey = 'id_profesor'; // Clave primaria PERSONALIZADA
    protected $fillable = [
        'nombre',
        'apellidos',
        'especialidad',
    ];

    public function matriculas() // Relación uno a muchos con Matricula
    {
        return $this->hasMany(Matricula::class, 'id_profesor', 'id_profesor');  
    }
}
