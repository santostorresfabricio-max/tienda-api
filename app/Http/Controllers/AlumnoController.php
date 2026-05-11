<?php

namespace App\Http\Controllers;

use App\Models\Alumno; // Importamos el modelo
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        // Traemos todos los alumnos de la base de datos
        $alumnos = Alumno::all();

        // Enviamos los datos a la vista 'alumno.blade.php'
        return view('alumno', compact('alumnos'));
    }

    public function store(Request $request)
{
    Alumno::create($request->all());
    return redirect()->back()->with('success', 'Alumno agregado');
}

public function update(Request $request, $id)
{
    $alumno = Alumno::findOrFail($id);
    $alumno->update($request->all());
    return redirect()->back()->with('success', 'Alumno actualizado');
}

public function destroy($id)
{
    Alumno::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Alumno eliminado');
}

}