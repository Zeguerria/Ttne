<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

}
