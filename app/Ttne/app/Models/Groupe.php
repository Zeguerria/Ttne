<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Groupe extends Model
{
    /** @use HasFactory<\Database\Factories\GroupeFactory> */
    use HasFactory;
    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'groupes';


    /*
    |--------------------------------------------------------------------------
    | FILLABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'nom',
        'slug',
        'description',

        'createur_id',

        'montant_cotisation',
        'penalite_pourcentage',
        'fonds_assurance_pourcentage',
        'delai_grace_heures',

        'nombre_participants_max',

        'periodicite_id',

        'date_debut',
        'date_fin_estimee',

        'mode_distribution_id',
        'validation_membre_id',
        'visibilite_id',
        'statut_id',

        'supprimer',
    ];


    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'montant_cotisation' => 'integer',

        'penalite_pourcentage' => 'decimal:2',

        'fonds_assurance_pourcentage' => 'decimal:2',

        'delai_grace_heures' => 'integer',

        'nombre_participants_max' => 'integer',

        'date_debut' => 'date',

        'date_fin_estimee' => 'date',

        'supprimer' => 'boolean',
    ];


    /*
    |--------------------------------------------------------------------------
    | CRÉATEUR
    |--------------------------------------------------------------------------
    |
    | Un groupe appartient à un utilisateur qui l'a créé.
    |
    */

    public function createur(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'createur_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PÉRIODICITÉ
    |--------------------------------------------------------------------------
    |
    | Exemple :
    | - Mensuelle
    | - Hebdomadaire
    | - Quotidienne
    |
    */

    public function periodicite(): BelongsTo
    {
        return $this->belongsTo(
            Periodicite::class,
            'periodicite_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MODE DE DISTRIBUTION
    |--------------------------------------------------------------------------
    |
    | Paramètre définissant la manière dont les cotisations
    | sont distribuées.
    |
    */

    public function modeDistribution(): BelongsTo
    {
        return $this->belongsTo(
            Parametre::class,
            'mode_distribution_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDATION MEMBRE
    |--------------------------------------------------------------------------
    |
    | Paramètre définissant la règle de validation des membres.
    |
    */

    public function validationMembre(): BelongsTo
    {
        return $this->belongsTo(
            Parametre::class,
            'validation_membre_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | VISIBILITÉ
    |--------------------------------------------------------------------------
    |
    | Exemple :
    | - Public
    | - Privé
    |
    */

    public function visibilite(): BelongsTo
    {
        return $this->belongsTo(
            Parametre::class,
            'visibilite_id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STATUT
    |--------------------------------------------------------------------------
    |
    | Exemple :
    | - En préparation
    | - Actif
    | - Terminé
    | - Suspendu
    |
    */

    public function statut(): BelongsTo
    {
        return $this->belongsTo(
            Parametre::class,
            'statut_id'
        );
    }
}
