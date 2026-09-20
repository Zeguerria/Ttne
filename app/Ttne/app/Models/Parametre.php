<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    /** @use HasFactory<\Database\Factories\ParametreFactory> */
    use HasFactory;
     /*
    |--------------------------------------------------------------------------
    | ATTRIBUT PRINCIPAL D'AFFICHAGE
    |--------------------------------------------------------------------------
    */

    protected $nomAttribut = 'libelle';

    /*
    |--------------------------------------------------------------------------
    | FILLABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'code',
        'libelle',
        'type_parametre_id',
        'is_active',
        'description',
        'supprimer',
        'created_at',
        'updated_at'
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
    /**
     * Relation avec TypeParametre
     * Chaque paramètre appartient à un type de paramètre
     */
    public function typeParametre()
    {
        return $this->belongsTo(TypeParametre::class, 'type_parametre_id');
    }

    public function piecesType()
    {
        return $this->hasMany(Piece::class, 'type_piece_id');
    }

    public function piecesStatut()
    {
        return $this->hasMany(Piece::class, 'statut_piece_id');
    }
    public function utilisateursStatut()
    {
        return $this->hasMany(User::class, 'statut_compte_id');
    }
    /*
    |--------------------------------------------------------------------------
    | GROUPES — MODE DE DISTRIBUTION
    |--------------------------------------------------------------------------
    */

    public function groupesModeDistribution(): HasMany
    {
        return $this->hasMany(
            Groupe::class,
            'mode_distribution_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GROUPES — VALIDATION MEMBRE
    |--------------------------------------------------------------------------
    */

    public function groupesValidationMembre(): HasMany
    {
        return $this->hasMany(
            Groupe::class,
            'validation_membre_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GROUPES — VISIBILITÉ
    |--------------------------------------------------------------------------
    */

    public function groupesVisibilite(): HasMany
    {
        return $this->hasMany(
            Groupe::class,
            'visibilite_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | GROUPES — STATUT
    |--------------------------------------------------------------------------
    */

    public function groupesStatut(): HasMany
    {
        return $this->hasMany(
            Groupe::class,
            'statut_id'
        );
    }

}
