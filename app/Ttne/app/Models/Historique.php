<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    /** @use HasFactory<\Database\Factories\HistoriqueFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'record_id',
        'record_type',
        'record_name',
        'action',
        'statut',
        'supprimer',
        'ancienne_valeur',
        'nouvelle_valeur',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'ancienne_valeur' => 'array',
        'nouvelle_valeur' => 'array',
        'statut' => 'boolean',
        'supprimer' => 'boolean',
    ];

    /**
     * Relation polymorphique
     */
    public function record()
    {
        return $this->morphTo();
    }

    /**
     * Relation utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
