<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;

class PredictionController extends Controller
{
    public function all()
    {
        $prediction = Prediction::predictions();
        return response()->json($prediction);
    }

    public function show($id)
    {
        $prediction = Prediction::find($id);
        if(!empty($prediction)){
            return response()->json($prediction);
        } else {
            return response()->json(['message' => 'Prediction inexistante'], 404);
        }
    }

    public function store(Request $request)
    {
        $prediction = new Prediction();
        $prediction->pre_comb_no = $request->combattant;
        $prediction->pre_choix = $request->choix;
        $prediction->pre_uti_no = $request->utilisateur;
        $prediction->pre_com_no = $request->combat;
        $prediction->save();
        return response()->json([
            'message' => 'Prediction ajoutée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Prediction::where('pre_no', $id)->exists()) {
            $prediction = Prediction::find($id);
            $prediction->pre_comb_no = $request->combattant;
            $prediction->pre_choix = $request->choix;
            $prediction->pre_uti_no = $request->utilisateur;
            $prediction->pre_com_no = $request->combat;
            $prediction->save();
            return response()->json([
                'message' => 'Prediction modifiée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Prediction inexistante'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Prediction::where('pre_no', $id)->exists()) {
            $prediction = Prediction::find($id);
            $prediction->delete();
            return response()->json([
                'message' => 'Prediction supprimée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Prediction inexistante'
            ], 404);
        }
    }
}
