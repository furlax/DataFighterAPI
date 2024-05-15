<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pro_utilisateur'; // Définir le nom de la table explicitement
    protected $primaryKey = 'uti_no'; // Définir la clé primaire explicitement
    public $created_at = false; // Désactiver les colonnes created_at et updated_at
    public $updated_at = false;
    public $timestamps = false; // Désactiver les colonnes created_at et updated_at
    public $autoincrement = true; // Désactiver l'incrémentation automatique

    // Indiquer les champs remplissables si nécessaire
    protected $fillable = [
        'uti_username',
        'uti_email',
        'uti_password',
        'uti_pre_no'
    ];

    protected $hidden = [
        'uti_password'
    ];

    protected $casts = [
        'uti_password' => 'hashed'
    ];

    public static function utilisateurs()
    {
        $utilisateurs = DB::table('pro_utilisateur')
            ->join('pro_personne', 'pro_utilisateur.uti_per_no', '=', 'pro_personne.per_no')
            ->select('pro_utilisateur.uti_no', 'pro_utilisateur.uti_username', 'pro_utilisateur.uti_email', 'pro_utilisateur.uti_password')
            ->get();
        return $utilisateurs;
    }

    public function hasRole($role)
    {
        return $this->uti_role === $role;
    }
}
