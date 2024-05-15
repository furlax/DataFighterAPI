<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistique;

class StatistiqueController extends Controller
{
    //
    public function all()
    {
        $statistique = Statistique::stats();
        return response()->json($statistique);
    }

    public function show($id)
    {
        $statistique = Statistique::find($id);
        if(!empty($statistique)){
            return response()->json($statistique);
        } else {
            return response()->json(['message' => 'Statistique inexistante'], 404);
        }
    }

    public function store(Request $request)
    {
        $statistique = new Statistique();
        $statistique->sta_resultat = $request->resultat;
        $statistique->sta_point = $request->point;
        $statistique->sta_duree = $request->duree;
        $statistique->sta_ko = $request->ko;
        $statistique->sta_tko = $request->tko;
        $statistique->sta_soumission = $request->soumission;
        $statistique->sta_draw = $request->draw;
        $statistique->sta_coupdonner = $request->coupdonner;
        $statistique->sta_coupreçu = $request->coupreçu;
        $statistique->sta_comb_no = $request->combattant;
        $statistique->sta_com_no = $request->combat;
        $statistique->save();
        return response()->json([
            'message' => 'Statistique ajoutée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Statistique::where('sta_com_no', $id)->exists()) {
            $statistique = Statistique::find($id);
            $statistique->sta_resultat = $request->resultat;
            $statistique->sta_point = $request->point;
            $statistique->sta_duree = $request->duree;
            $statistique->sta_ko = $request->ko;
            $statistique->sta_tko = $request->tko;
            $statistique->sta_soumission = $request->soumission;
            $statistique->sta_draw = $request->draw;
            $statistique->sta_coupdonner = $request->coupdonner;
            $statistique->sta_coupreçu = $request->coupreçu;
            $statistique->sta_comb_no = $request->combattant;
            $statistique->sta_com_no = $request->combat;
            $statistique->save();
            return response()->json([
                'message' => 'Statistique modifiée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Statistique inexistante'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Statistique::where('sta_com_no', $id)->exists()) {
            $statistique = Statistique::find($id);
            $statistique->delete();
            return response()->json([
                'message' => 'Statistique supprimée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Statistique inexistante'
            ], 404);
        }
    }




}
