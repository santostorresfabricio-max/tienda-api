<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $primaryKey = 'id_horario'; // Clave primaria PERSONALIZADA
    protected $fillable = [
        'id_curso',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
    ];

        public function curso() // Relación inversa con Curso
        {
            return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
        }
        public function matriculas() // Relación uno a muchos con Matricula
        {
            return $this->hasMany(Matricula::class, 'id_horario', 'id_horario');  
        }
}
