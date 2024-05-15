<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Personne extends Model
{
    use HasFactory;
    protected $table = 'pro_personne'; // S'assurer que le modèle pointe sur la bonne table
    protected $primaryKey = 'per_no'; // Définir la clé primaire
    public $incrementing = false; // Important si vous utilisez une clé primaire non-auto-increment
    protected $fillable = ['per_nom', 'per_prenom', 'per_pays', 'per_equ_no', 'per_comb_no', 'per_uti_no']; // Champs assignables en masse


    public static function personnes()
    {
        $personnes = DB::table('pro_personne')
            // il faut ajouter l'utilisateur
            //->join('pro_utilisateur', 'pro_personne.per_uti_no', '=', 'pro_utilisateur.uti_no')
            ->select('pro_personne.*')
            ->get();

        return $personnes;
    }


}
