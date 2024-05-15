<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prediction extends Model
{
    use HasFactory;
    protected $table = 'pro_prediction'; // Ensures the model points to the correct database table
    protected $primaryKey = 'pre_no'; // Defines the primary key
    public $incrementing = false; // Indicates that the primary key is not auto-incrementing
    protected $fillable = [
        'pre_victoire',
        'pre_defaite',
        'uti_pre_no' // Assuming it needs to be fillable if handled manually
    ];

    public static function predictions()
    {
        $predictions = DB::table('pro_prediction')
            ->join('pro_combat', 'pro_prediction.pre_com_no', '=', 'pro_combat.com_no')
            ->join('pro_utilisateur', 'pro_prediction.pre_uti_no', '=', 'pro_utilisateur.uti_no')
            ->select('pro_prediction.*', 'pro_combat.com_no', 'pro_utilisateur.uti_no')
            ->get();

        return $predictions;
    }
}
