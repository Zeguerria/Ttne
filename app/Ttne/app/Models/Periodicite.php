<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodicite extends Model
{
    /** @use HasFactory<\Database\Factories\PeriodiciteFactory> */
    use HasFactory;
    protected $nomAttribut = 'nom';

    /**
     * Nom de la table
     */
    protected $table = 'periodicites';

    /**
     * Champs pouvant être remplis
     */
    protected $fillable = [
        'nom',
        'code',
        'unite',
        'valeur',
        'description',
        'active',
        'supprimer',
    ];
     /*
    |--------------------------------------------------------------------------
    | ATTRIBUT PRINCIPAL D'AFFICHAGE
    |--------------------------------------------------------------------------
    */


    /**
     * Cast des attributs
     */
    protected $casts = [
        'valeur'   => 'integer',
        'active'   => 'boolean',
        'supprimer' => 'boolean',
    ];
    /*
    |--------------------------------------------------------------------------
    | NOM D'AFFICHAGE UNIVERSEL
    |--------------------------------------------------------------------------
    */

    public function getDisplayName(): string
    {
        return $this->{$this->nomAttribut}
            ?? class_basename($this) . ' #' . $this->id;
    }
}
