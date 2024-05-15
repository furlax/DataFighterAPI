<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function all()
    {
        $categorie = Categorie::categorie();
        return response()->json($categorie);
    }

    public function show($id)
    {
        $categorie = Categorie::find($id);
        if(!empty($categorie)){
            return response()->json($categorie);
        } else {
            return response()->json(['message' => 'Categorie inexistante'], 404);
        }
    }


    public function store(Request $request)
    {
        $categorie = new Categorie();
        $categorie->cat_nom = $request->nom;
        $categorie->cat_poidsmin = $request->poidsmin;
        $categorie->cat_poidsmax = $request->poidsmax;
        $categorie->save();
        return response()->json([
            'message' => 'Categorie ajoutée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Categorie::where('cat_no', $id)->exists()) {
            $categorie = Categorie::find($id);
            $categorie->cat_nom = $request->nom;
            $categorie->cat_poidsmin = $request->poidsmin;
            $categorie->cat_poidsmax = $request->poidsmax;
            $categorie->save();
            return response()->json([
                'message' => 'Categorie modifiée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Categorie inexistante'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Categorie::where('cat_no', $id)->exists()) {
            $categorie = Categorie::find($id);
            $categorie->delete();
            return response()->json([
                'message' => 'Categorie supprimée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Categorie inexistante'
            ], 404);
        }
    }
}
