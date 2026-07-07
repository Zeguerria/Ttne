<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilitation extends Model
{
    /** @use HasFactory<\Database\Factories\HabilitationFactory> */
    use HasFactory;
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

     public function getDisplayName(): string
    {
        return $this->{$this->nomAttribut}
            ?? class_basename($this) . ' #' . $this->id;
    }

}
