<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typesport;

class TypesportController extends Controller
{
    public function all()
    {
        $typesport = Typesport::typesport();
        return response()->json($typesport);
    }

    public function show($id)
    {
        $typesport = Typesport::find($id);
        if(!empty($typesport)){
            return response()->json($typesport);
        } else {
            return response()->json(['message' => 'Typesport inexistant'], 404);
        }
    }

    public function store(Request $request)
    {
        $typesport = new Typesport();
        $typesport->typ_nom = $request->nom;
        $typesport->save();
        return response()->json([
            'message' => 'Typesport ajouté avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Typesport::where('typ_no', $id)->exists()) {
            $typesport = Typesport::find($id);
            $typesport->typ_nom = $request->nom;
            $typesport->save();
            return response()->json([
                'message' => 'Typesport modifié avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Typesport inexistant'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Typesport::where('typ_no', $id)->exists()) {
            $typesport = Typesport::find($id);
            $typesport->delete();
            return response()->json([
                'message' => 'Typesport supprimé avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Typesport inexistant'
            ], 404);
        }
    }
}
