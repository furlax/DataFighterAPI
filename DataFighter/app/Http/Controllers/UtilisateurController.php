<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Utilisateur; // Import the model


class UtilisateurController extends Controller
{
    public function all()
    {
        $utilisateurs = Utilisateur::utilisateurs(); // Call the static method from the model
        return response()->json($utilisateurs);
    }

    public function show($id)
    {
        $utilisateur = Utilisateur::find($id); // Call the static method from the model
        if(!empty($utilisateur)){
            return response()->json($utilisateur);
        } else {
            return response()->json(['message' => 'Utilisateur inexistant'], 404);
        }
    }

    public function store(Request $request)
    {
        $utilisateur = new Utilisateur();
        //$utilisateur->uti_no = $request->no;
        $utilisateur->uti_username = $request->username;
        $utilisateur->uti_email = $request->email;
        $utilisateur->uti_role = $request->role;
        $utilisateur->uti_password = Hash::make($request->password);
        $utilisateur->uti_per_no = $request->personne;
        $utilisateur->save();
        return response()->json([
            'message' => 'Utilisateur ajouté avec succès'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        if(Utilisateur::where('uti_no', $id)->exists()) {
            $utilisateur = Utilisateur::find($id);
            $utilisateur->uti_username = $request->username;
            $utilisateur->uti_email = $request->email;
            $utilisateur->uti_role = $request->role;
            $utilisateur->uti_password = $request->password;
            $utilisateur->uti_per_no = $request->personne;
            $utilisateur->save();
            return response()->json([
                'message' => 'Utilisateur modifié avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Utilisateur inexistant'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Utilisateur::where('uti_no', $id)->exists()) {
            $utilisateur = Utilisateur::find($id);
            $utilisateur->delete();
            return response()->json([
                'message' => 'Utilisateur supprimé avec succès'
            ], 202);
        } else {
            return response()->json([
                'message' => 'Utilisateur inexistant'
            ], 404);
        }
    }
}
