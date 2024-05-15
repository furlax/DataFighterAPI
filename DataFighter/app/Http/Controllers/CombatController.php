<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combat;

class CombatController extends Controller
{
    public function all()
    {
        $combat = Combat::combats();
        return response()->json($combat);
    }

    public function show($id)
    {
        $combat = Combat::find($id);
        if(!empty($combat)){
            return response()->json($combat);
        } else {
            return response()->json(['message' => 'Combat inexistant'], 404);
        }
    }

    public function store(Request $request)
    {
        $combat = new Combat();
        $combat->heuredebut = $request->heuredebut;
            $combat->com_heurefin = $request->heurefin;
            $combat->com_lieu = $request->lieu;
            $combat->com_cat_no = $request->categorie;
            $combat->com_org_no = $request->organisation;
        $combat->save();
        return response()->json([
            'message' => 'Combat ajouté avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Combat::where('com_no', $id)->exists()) {
            $combat = Combat::find($id);
            $combat->heuredebut = $request->heuredebut;
            $combat->com_heurefin = $request->heurefin;
            $combat->com_lieu = $request->lieu;
            $combat->com_cat_no = $request->categorie;
            $combat->com_org_no = $request->organisation;
            $combat->save();
            return response()->json([
                'message' => 'Combat modifié avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Combat inexistant'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Combat::where('com_no', $id)->exists()) {
            $combat = Combat::find($id);
            $combat->delete();
            return response()->json([
                'message' => 'Combat supprimé avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Combat inexistant'
            ], 404);
        }
    }
}
