<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Historique extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'historiques';



    /*
    |--------------------------------------------------------------------------
    | MASS ASSIGNABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        /*
        | USER
        */
        'user_id',

        /*
        | POLYMORPHIC RECORD
        */
        'record_id',
        'record_type',

        /*
        | DISPLAY
        */
        'record_name',

        /*
        | ACTION
        | create
        | update
        | delete
        | restore
        | force_delete
        | login
        | logout
        */
        'action',

        /*
        | STATUS
        */
        'statut',
        'supprimer',

        /*
        | OLD / NEW VALUES
        */
        'ancienne_valeur',
        'nouvelle_valeur',

        /*
        | REQUEST INFORMATIONS
        */
        'ip_address',
        'user_agent',

    ];



    /*
    |--------------------------------------------------------------------------
    | CASTS
    |--------------------------------------------------------------------------
    */

    protected $casts = [

        'ancienne_valeur' => 'array',

        'nouvelle_valeur' => 'array',

        'statut' => 'boolean',

        'supprimer' => 'boolean',

    ];



    /*
    |--------------------------------------------------------------------------
    | ACTION LABELS
    |--------------------------------------------------------------------------
    */

    public const ACTION_CREATE = 'create';

    public const ACTION_UPDATE = 'update';

    public const ACTION_DELETE = 'delete';

    public const ACTION_RESTORE = 'restore';

    public const ACTION_FORCE_DELETE = 'force_delete';

    public const ACTION_LOGIN = 'login';

    public const ACTION_LOGOUT = 'logout';



    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Relation polymorphique
     */
    public function record(): MorphTo
    {
        return $this->morphTo();
    }



    /**
     * Relation utilisateur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Historique supprimé
     */
    public function scopeDeleted($query)
    {
        return $query->where(
            'supprimer',
            true
        );
    }



    /**
     * Historique actif
     */
    public function scopeActive($query)
    {
        return $query->where(
            'supprimer',
            false
        );
    }



    /**
     * Filtrer par action
     */
    public function scopeAction($query, string $action)
    {
        return $query->where(
            'action',
            $action
        );
    }



    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Badge couleur action
     */
    public function getActionColorAttribute(): string
    {
        return match($this->action){

            self::ACTION_CREATE => 'success',

            self::ACTION_UPDATE => 'warning',

            self::ACTION_DELETE => 'danger',

            self::ACTION_RESTORE => 'info',

            self::ACTION_FORCE_DELETE => 'dark',

            self::ACTION_LOGIN => 'primary',

            self::ACTION_LOGOUT => 'secondary',

            default => 'light',

        };
    }



    /**
     * Libellé action
     */
    public function getActionLabelAttribute(): string
    {
        return match($this->action){

            self::ACTION_CREATE => 'Création',

            self::ACTION_UPDATE => 'Modification',

            self::ACTION_DELETE => 'Suppression',

            self::ACTION_RESTORE => 'Restauration',

            self::ACTION_FORCE_DELETE => 'Suppression définitive',

            self::ACTION_LOGIN => 'Connexion',

            self::ACTION_LOGOUT => 'Déconnexion',

            default => ucfirst($this->action),

        };
    }
}
