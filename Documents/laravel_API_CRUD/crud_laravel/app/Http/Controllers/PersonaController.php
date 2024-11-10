<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    // Méthode pour créer une nouvelle persona
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|integer',
            'email' => 'required|email|unique:personas,email',
            'telephone' => 'required|string|unique:personas,telephone',
        ]);

        $persona = Persona::create($request->all());

        return response()->json([
            'message' => 'Persona créée avec succès!',
            'data' => $persona
        ], 201);
    }

    // Méthode pour afficher toutes les personas
    public function index()
    {
        $personas = Persona::all();

        return response()->json($personas);
    }

    // Méthode pour afficher une persona spécifique
    public function show($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            return response()->json([
                'message' => 'Persona non trouvée'
            ], 404);
        }

        return response()->json($persona);
    }

    // Méthode pour mettre à jour une persona
    public function update(Request $request, $id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            return response()->json([
                'message' => 'Persona non trouvée'
            ], 404);
        }

        $request->validate([
            'nom' => 'string|max:255',
            'prenom' => 'string|max:255',
            'age' => 'integer',
            'email' => 'email|unique:personas,email,' . $id,
            'telephone' => 'string|unique:personas,telephone,' . $id,
        ]);

        $persona->update($request->all());

        return response()->json([
            'message' => 'Persona mise à jour avec succès!',
            'data' => $persona
        ]);
    }

    // Méthode pour supprimer une persona
    public function destroy($id)
    {
        $persona = Persona::find($id);

        if (!$persona) {
            return response()->json([
                'message' => 'Persona non trouvée'
            ], 404);
        }

        $persona->delete();

        return response()->json([
            'message' => 'Persona supprimée avec succès!'
        ]);
    }
}