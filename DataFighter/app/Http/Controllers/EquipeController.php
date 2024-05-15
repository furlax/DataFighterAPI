<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipe;

class EquipeController extends Controller
{
    public function all()
    {
        $equipe = Equipe::equipes();
        return response()->json($equipe);
    }

    public function show($id)
    {
        $equipe = Equipe::find($id);
        if(!empty($equipe)){
            return response()->json($equipe);
        } else {
            return response()->json(['message' => 'Equipe inexistante'], 404);
        }
    }


    public function store(Request $request)
    {
        $equipe = new Equipe();
        $equipe->equ_nom = $request->nom;
        $equipe->equ_anneedebut = $request->anneedebut;
        $equipe->equ_anneefin = $request->anneefin;
        $equipe->equ_per_no = $request->personne;
        $equipe->save();
        return response()->json([
            'message' => 'Equipe ajoutée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Equipe::where('equ_no', $id)->exists()) {
            $equipe = Equipe::find($id);
            $equipe->equ_nom = $request->nom;
            $equipe->equ_anneedebut = $request->anneedebut;
            $equipe->equ_anneefin = $request->anneefin;
            $equipe->equ_per_no = $request->personne;
            $equipe->save();
            return response()->json([
                'message' => 'Equipe modifiée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Equipe inexistante'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Equipe::where('equ_no', $id)->exists()) {
            $equipe = Equipe::find($id);
            $equipe->delete();
            return response()->json([
                'message' => 'Equipe supprimée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Equipe inexistante'
            ], 404);
        }
    }
}
