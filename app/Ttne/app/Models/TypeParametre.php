<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeParametre extends Model
{
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
        'description',
        'supprimer',
        'created_at',
        'updated_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function parametres()
    {
        return $this->hasMany(
            Parametre::class,
            'type_parametre_id',
            'id'
        );
    }

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
