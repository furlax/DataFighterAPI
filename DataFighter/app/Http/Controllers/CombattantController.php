<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Combattant;


class CombattantController extends Controller
{
    public function all()
    {
        $combattant = Combattant::combattants();
        return response()->json($combattant);
    }

    public function show($id)
    {
        $combattant = Combattant::find($id);
        if(!empty($combattant)){
            return response()->json($combattant);
        } else {
            return response()->json(['message' => 'Combattant inexistant'], 404);
        }
    }

    public function store(Request $request)
    {
        $combattant = new Combattant();
        $combattant->comb_poids = $request->poids;
        $combattant->comb_niveau = $request->niveau;
        $combattant->comb_sexe = $request->sexe;
        $combattant->comb_taille = $request->taille;
        $combattant->comb_typ_no = $request->typesport;
        $combattant->comb_per_no = $request->personne;
        $combattant->save();
        return response()->json([
            'message' => 'Combattant ajouté avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Combattant::where('comb_no', $id)->exists()) {
            $combattant = Combattant::find($id);
            $combattant->comb_poids = $request->poids;
            $combattant->comb_niveau = $request->niveau;
            $combattant->comb_sexe = $request->sexe;
            $combattant->comb_taille = $request->taille;
            $combattant->comb_typ_no = $request->typesport;
            $combattant->comb_per_no = $request->personne;
            $combattant->save();
            return response()->json([
                'message' => 'Combattant modifié avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Combattant inexistant'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Combattant::where('comb_no', $id)->exists()) {
            $combattant = Combattant::find($id);
            $combattant->delete();
            return response()->json([
                'message' => 'Combattant supprimé avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Combattant inexistant'
            ], 404);
        }
    }
}
