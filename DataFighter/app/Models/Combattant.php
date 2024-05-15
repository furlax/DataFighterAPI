<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Combattant extends Model
{
    use HasFactory;
    protected $table = 'pro_combattant'; // S'assurer que le modèle pointe sur la bonne table
    protected $primaryKey = 'comb_no'; // Définir la clé primaire
    public $incrementing = false; // Important si vous utilisez une clé primaire non-auto-increment
    protected $fillable = [
        'comb_poids',
        'comb_niveau',
        'comb_poidsKg',
        'comb_sexe',
        'comb_taille',
        'comb_datenaissance',
        'comb_typ_no'
    ]; // Champs assignables en masse

    public static function combattants()
    {
        $combattants = DB::table('pro_combattant')
            ->join('pro_type_sport', 'pro_combattant.comb_typ_no', '=', 'pro_type_sport.typ_no')
            ->join('pro_personne', 'pro_combattant.comb_per_no', '=', 'pro_personne.per_no')
            ->select('pro_type_sport.*', 'pro_combattant.comb_no')
            ->get();

        return $combattants;
    }
}
