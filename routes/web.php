<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfesorController;

use App\Models\Career;
use App\Models\Profesor;

Route::get('/', function () {

    $careers = Career::all();

    return view('register', compact('careers'));
});

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);

// Esta es la ruta para MOSTRAR la tabla
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('/cursos', [CursoController::class, 'index'])->name('curso.index');
Route::get('/profesor', [ProfesorController::class, 'index'])->name('profesor.index');

// Las que ya tienes (para ACCIONES)
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::put('/alumnos/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
