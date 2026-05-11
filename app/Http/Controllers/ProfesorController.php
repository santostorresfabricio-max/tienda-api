<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
{
    // IMPORTANTE: El nombre de la variable debe ser $profesores (en plural)
    $profesores = Profesor::all(); 
    
    // El primer parámetro es el nombre de tu archivo .blade.php
    return view('profesor', compact('profesores'));
}
}
