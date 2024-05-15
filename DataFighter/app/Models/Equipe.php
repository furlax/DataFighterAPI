<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Equipe extends Model
{
    use HasFactory;
    protected $table = 'pro_equipe'; // Assurer que le modèle pointe sur la bonne table
    protected $primaryKey = 'equ_no'; // Définir la clé primaire
    public $incrementing = false; // Important si vous utilisez une clé primaire non-auto-increment
    protected $fillable = [
        'equ_nom',
        'equ_anneedebut',
        'equ_anneefin'
    ]; // Champs assignables en masse

    public static function equipes()
    {
        $equipes = DB::table('pro_equipe')
            ->join('pro_personne', 'pro_equipe.equ_per_no', '=', 'pro_personne.per_no')
            ->select('pro_equipe.equ_no', 'pro_equipe.equ_nom', 'pro_equipe.equ_anneedebut', 'pro_equipe.equ_anneefin', 'pro_personne.per_no')
            ->get();

        return $equipes;
    }
}
