<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Typesport extends Model
{
    use HasFactory;
    protected $table = 'pro_type_sport'; // Ensures the model points to the correct database table
    protected $primaryKey = 'typ_no'; // Defines the primary key
    public $incrementing = false; // Indicates that the primary key is not auto-incrementing
    protected $fillable = [
        'typ_nom' // Fields that can be filled via mass assignment
    ];

    public static function typesport()
    {
        $typesport = DB::table('pro_type_sport')
            ->join('pro_combattant', 'pro_type_sport.typ_no', '=', 'pro_combattant.comb_typ_no')
            ->select('typ_no', 'typ_nom', 'pro_combattant.comb_no')
            ->get();
        
        return $typesport;
    }
}
