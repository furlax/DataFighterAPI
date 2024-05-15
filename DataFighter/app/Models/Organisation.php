<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organisation extends Model
{
    use HasFactory;
    protected $table = 'pro_organisation'; // Ensures the model points to the correct database table
    protected $primaryKey = 'org_no'; // Defines the primary key
    public $incrementing = false; // Important if the primary key is not an auto-incrementing integer
    protected $fillable = [
        'org_nom' // Fields that are mass assignable
    ]; // Fields that can be filled via mass assignment

    public static function organisations()
    {
        $organisations = DB::table('pro_organisation')
            ->join('pro_combat', 'pro_organisation.org_no', '=', 'pro_combat.com_org_no')
            ->select('org_no', 'org_nom', 'pro_combat.com_no')
            ->get();
        
        return $organisations;
    }
}
