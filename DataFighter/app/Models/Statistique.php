<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Importer la classe DB

class Statistique extends Model
{
    use HasFactory;
    protected $table = 'pro_statistique'; // S'assurer que le modèle pointe sur la bonne table
    public $incrementing = false; // Important si vous utilisez des clés non-auto-increment
    protected $primaryKey = ['sta_comb_no', 'sta_com_no']; // Définir la clé primaire composite
    protected $fillable = [
        'sta_resultat',
        'sta_point',
        'sta_duree',
        'sta_ko',
        'sta_tko',
        'sta_soumission',
        'sta_draw',
        'sta_coupdonner',
        'sta_couprecu',
        'sta_comb_no',
        'sta_com_no'
    ];

    #public function combattant()
    #{
    #    return $this->belongsTo(Combattant::class, 'sta_comb_no', 'comb_no');
    #}


    public static function stats()
    {
        $statistique = DB::table('pro_statistique')
            ->join('pro_combattant', 'pro_statistique.sta_comb_no', '=', 'pro_combattant.comb_no')
            ->join('pro_combat', 'pro_statistique.sta_com_no', '=', 'pro_combat.com_no')
            ->select('pro_combattant.comb_no', 'pro_combat.com_no', 'pro_statistique.*')
            ->get();

        return $statistique;
    }
}
