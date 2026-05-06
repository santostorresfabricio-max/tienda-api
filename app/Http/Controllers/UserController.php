<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Career;


class UserController extends Controller
{
public function create()
    {
        $careers = Career::all(); // Traer todas las carreras
        return view('register', compact('careers'));
    }
public function store(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:users,email',
'password' => 'required|min:8|confirmed',
'career_id' => 'required|exists:careers,id',
'terms_accepted' => 'accepted',
]);

User::create([
'name' => $request->name,
'email' => $request->email,
'password' => bcrypt($request->password),
'career_id' => $request->career_id,
'terms_accepted' => $request->has('terms_accepted'),
]);

return redirect()->route('register')->with('success', 'Usuario
registrado exitosamente');
}
}