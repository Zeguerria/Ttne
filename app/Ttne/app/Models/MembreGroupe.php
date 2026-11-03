<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupeMembre extends Model
{
    protected $table = 'groupe_membres';

    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTS AUTORISÉS
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'groupe_id',
        'utilisateur_id',
        'role_groupe_id',
        'statut_id',
        'position',
        'montant_depot',
        'date_demande',
        'date_validation',
        'valider_par',
        'supprimer',
    ];

    /*
    |--------------------------------------------------------------------------
    | CONVERSIONS DES ATTRIBUTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [
        'groupe_id' => 'integer',
        'utilisateur_id' => 'integer',
        'role_groupe_id' => 'integer',
        'statut_id' => 'integer',
        'position' => 'integer',
        'montant_depot' => 'integer',
        'date_demande' => 'datetime',
        'date_validation' => 'datetime',
        'valider_par' => 'integer',
        'supprimer' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION AVEC GROUPE
    |--------------------------------------------------------------------------
    */

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'groupe_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION AVEC UTILISATEUR
    |--------------------------------------------------------------------------
    */

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION AVEC ROLE GROUPE
    |--------------------------------------------------------------------------
    */

    public function roleGroupe()
    {
        return $this->belongsTo(RoleGroupe::class, 'role_groupe_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION AVEC PARAMETRE (STATUT)
    |--------------------------------------------------------------------------
    */

    public function statut()
    {
        return $this->belongsTo(Parametre::class, 'statut_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION AVEC LE VALIDATEUR
    |--------------------------------------------------------------------------
    */

    public function validateur()
    {
        return $this->belongsTo(User::class, 'valider_par');
    }
}
