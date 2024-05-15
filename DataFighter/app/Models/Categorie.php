<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Import the DB class
use App\Models\Categorie;


class Categorie extends Model
{
    use HasFactory;
    protected $table = 'pro_categorie'; // Ensures the model points to the correct database table
    protected $primaryKey = 'cat_no'; // Defines the primary key
    public $incrementing = false; // Important if the primary key is not an auto-incrementing integer
    protected $fillable = [
        'cat_nom',
        'cat_poidsmin',
        'cat_poidsmax'
    ];
    public $timestamps = false; // Disable created_at and updated_at columns

    public static function categorie()
    {
        $categorie = DB::table('pro_categorie')
            ->join('pro_combat', 'pro_categorie.cat_no', '=', 'pro_combat.com_cat_no')
            ->select('cat_no', 'cat_nom', 'cat_poidsmin', 'cat_poidsmax')
            ->get();
        
        return $categorie;
    }
}
