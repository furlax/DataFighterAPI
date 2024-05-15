<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;

class PersonneController extends Controller
{
    public function all()
    {
        $personne = Personne::personnes();
        return response()->json($personne);
    }

    public function show($id)
    {
        $personne = Personne::find($id);
        if(!empty($personne)){
            return response()->json($personne);
        } else {
            return response()->json(['message' => 'Personne inexistante'], 404);
        }
    }

    public function store(Request $request)
    {
        $personne = new Personne();
        $personne->per_nom = $request->nom;
        $personne->per_prenom = $request->prenom;
        $personne->per_datenaissance = $request->datenaissance;
        $personne->per_pays = $request->pays;
        $personne->save();
        return response()->json([
            'message' => 'Personne ajoutée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Personne::where('per_no', $id)->exists()) {
            $personne = Personne::find($id);
            $personne->per_nom = $request->nom;
            $personne->per_prenom = $request->prenom;
            $personne->per_datenaissance = $request->datenaissance;
            $personne->per_pays = $request->pays;
            $personne->save();
            return response()->json([
                'message' => 'Personne modifiée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Personne inexistante'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Personne::where('per_no', $id)->exists()) {
            $personne = Personne::find($id);
            $personne->delete();
            return response()->json([
                'message' => 'Personne supprimée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Personne inexistante'
            ], 404);
        }
    }
}
