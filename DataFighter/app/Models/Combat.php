<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Import the DB class


class Combat extends Model
{
    use HasFactory;
    protected $table = 'pro_combat'; // Ensure the model points to the correct database table
    protected $primaryKey = 'com_no'; // Define the primary key
    public $incrementing = false; // Important if the primary key is not an auto-incrementing integer
    protected $fillable = [
        'com_heuredebut',
        'com_heurefin',
        'com_lieu',
        'com_cat_no',
        'com_org_no',
        'com_pre_no' // Assuming it's fillable and used in business logic.
    ];


    public static function combats()
    {
        $combats = DB::table('pro_combat')
            ->join('pro_categorie', 'pro_combat.com_cat_no', '=', 'pro_categorie.cat_no')
            ->join('pro_organisation', 'pro_combat.com_org_no', '=', 'pro_organisation.org_no')
            ->select('pro_categorie.cat_nom', 'pro_organisation.org_nom', 'pro_combat.*')
            ->get();

        return $combats;
    }

}
