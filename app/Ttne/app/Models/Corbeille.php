<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corbeille extends Model
{
    /** @use HasFactory<\Database\Factories\CorbeilleFactory> */
    use HasFactory;

    protected $table = 'corbeilles';

    protected $fillable = [
        'element_id',
        'table_name',
        'slug',
        'type',
        'deleted_by',
        'deleted_at',
        'deleted_forever',
        'data_snapshot',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'deleted_forever' => 'boolean',
        'data_snapshot' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    /**
     * Retourne le modèle réel lié à la corbeille
     */
    public function getModelInstance()
    {
        $modelClass = $this->resolveModelClass();

        if (!$modelClass) {
            return null;
        }

        return $modelClass::withoutGlobalScopes()
            ->find($this->element_id);
    }

    /**
     * Résout automatiquement le modèle depuis table_name
     */
    private function resolveModelClass()
    {
        $models = [
            'type_parametres' => \App\Models\TypeParametre::class,
            'parametres' => \App\Models\Parametre::class,
            'users' => \App\Models\User::class,

            // ajouter les autres tables ici
            // 'users' => User::class,
            // 'articles' => Article::class,
        ];

        return $models[$this->table_name] ?? null;
    }
}
