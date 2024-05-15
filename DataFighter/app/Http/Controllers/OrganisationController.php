<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    public function all()
    {
        $organisation = Organisation::organisations();
        return response()->json($organisation);
    }

    public function show($id)
    {
        $organisation = Organisation::find($id);
        if(!empty($organisation)){
            return response()->json($organisation);
        } else {
            return response()->json(['message' => 'Organisation inexistante'], 404);
        }
    }

    public function store(Request $request)
    {
        $organisation = new Organisation();
        $organisation->org_nom = $request->nom;
        $organisation->save();
        return response()->json([
            'message' => 'Organisation ajoutée avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Organisation::where('org_no', $id)->exists()) {
            $organisation = Organisation::find($id);
            $organisation->org_nom = $request->nom;
            $organisation->save();
            return response()->json([
                'message' => 'Organisation modifiée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Organisation inexistante'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Organisation::where('org_no', $id)->exists()) {
            $organisation = Organisation::find($id);
            $organisation->delete();
            return response()->json([
                'message' => 'Organisation supprimée avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Organisation inexistante'
            ], 404);
        }
    }
}
