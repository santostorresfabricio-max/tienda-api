<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $primaryKey = 'id_matricula'; // Clave primaria PERSONALIZADA
    protected $fillable = [ // Campos que se pueden asignar masivamente
        'id_alumno',
        'id_curso',
        'id_profesor',
        'id_horario',
        'semestre',
        'fecha_matricula',
        'nota_final', 
        'estado',
    ];

    public function alumno() // Relación inversa con Alumno
    {
        return $this->belongsTo(Alumno::class, 'id_alumno', 'id_alumno');
    }

    public function curso() // Relación inversa con Curso
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }

    public function profesor() // Relación inversa con Profesor
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id_profesor');
    }

    public function horario() // Relación inversa con Horario
    {
        return $this->belongsTo(Horario::class, 'id_horario', 'id_horario');
    }

}

