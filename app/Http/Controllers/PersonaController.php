<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $persona = Persona::all();
        return response()->json([
            'status' => 'correcto',
            'personas' => $persona,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:8',
            'nombre' => 'required|string|max:255',
            'ap' => 'required|string|max:255',
            'am' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'genero' => 'required|string|max:1',
            'correo' => 'required|email|max:100',
            
        ]);

        $persona = Persona::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'ap' => $request->ap,
            'am' => $request->am,
            'telefono' => $request->telefono,
            'genero' => $request->genero,
            'correo' => $request->correo,
        ]);

        return response()->json([
            'estado' => 'correcto',
            'mensaje' => 'Se creo correctamente',
            'persona' => $persona
        ]);
    }

    public function show($id)
    {
        $persona = Persona::find($id);
        return response()->json([
            'estado' => 'correcto',
            'persona' => $persona
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required|string|max:8',
            'nombre' => 'required|string|max:255',
            'ap' => 'required|string|max:255',
            'am' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'genero' => 'required|char|max:1',
            'correo' => 'required|email|max:100',
        ]);

        $persona = Persona::find($id);
        $persona->dni = $request->dni;
        $persona->nombre = $request->nombre;
        $persona->ap = $request->ap;
        $persona->am = $request->am;
        $persona->telefono = $request->telefono;
        $persona->genero = $request->genero;
        $persona->correo = $request->correo;
        $persona->save();

        return response()->json([
            'estado' => 'correcto',
            'mensaje' => 'Se actualizó correctamente',
            'persona' => $persona,
        ]);
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        return response()->json([
            'estado' => 'correcto',
            'mensaje' => 'Persona eliminada correctamente',
            'persona' => $persona,
        ]);
    }
}
