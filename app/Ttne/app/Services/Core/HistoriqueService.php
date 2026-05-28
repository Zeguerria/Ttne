<?php

namespace App\Services\Core;

use App\Models\Historique;
use Illuminate\Support\Facades\Auth;

class HistoriqueService
{
    /**
     * ENREGISTRE UNE ACTION DANS L'HISTORIQUE
     */
    public static function enregistrer(
        $record,
        string $action,
        array $ancienneValeur = null,
        array $nouvelleValeur = null
    ) {
        if (!is_object($record)) {
            return;
        }

        $user = Auth::user();

        Historique::create([

            // utilisateur
            'user_id' => $user?->id,

            // polymorphique
            'record_type' => get_class($record),
            'record_id' => $record->id ?? null,

            // affichage
            'record_name' => self::getRecordName($record),
            'action' => $action,

            // données
            'ancienne_valeur' => $ancienneValeur,
            'nouvelle_valeur' => $nouvelleValeur,

            // snapshot complet du record
            'record_snapshot' => $record?->toArray(),

            // sécurité
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * NOM DU RECORD (fallback intelligent)
     */
    private static function getRecordName($record): string
    {
        if (method_exists($record, 'getNom')) {
            return $record->getNom();
        }

        return $record->libelle
            ?? $record->nom
            ?? $record->title
            ?? $record->name
            ?? 'N/A';
    }

    // =========================================================
    // ACTIONS SIMPLIFIÉES
    // =========================================================

    /**
     * Création
     */
    public static function creer($record)
    {
        self::enregistrer($record, 'création');
    }

    /**
     * Modification
     */
    public static function modifier(
        $record,
        array $old = null,
        array $new = null
    ) {
        self::enregistrer(
            $record,
            'modification',
            $old,
            $new
        );
    }

    /**
     * Suppression simple
     */
    public static function supprimer($record)
    {
        self::enregistrer($record, 'suppression');
    }

    /**
     * Mise en corbeille
     */
    public static function miseEnCorbeille($record)
    {
        self::enregistrer($record, 'mise en corbeille');
    }

    /**
     * Restauration
     */
    public static function restauration($record)
    {
        self::enregistrer($record, 'restauration');
    }

    /**
     * Suppression définitive
     */
    public static function suppressionDefinitive($record)
    {
        self::enregistrer(
            $record,
            'suppression définitive',
            $record?->toArray(),
            null
        );
    }

    // =========================================================
    // ACTIONS MASSIVES
    // =========================================================

    public static function actionMassive(
        string $table,
        string $action
    ) {
        $user = Auth::user();

        Historique::create([

            'user_id' => $user?->id,

            // ici on stocke juste le nom de table
            'record_type' => $table,
            'record_id' => null,

            'record_name' => null,

            'action' => $action,

            'ancienne_valeur' => null,
            'nouvelle_valeur' => null,

            'record_snapshot' => null,

            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Suppression massive
     */
    public static function toutSupprimer($table)
    {
        self::actionMassive(
            $table,
            'suppression massive'
        );
    }

    /**
     * Mise en corbeille massive
     */
    public static function toutMettreEnCorbeille($table)
    {
        self::actionMassive(
            $table,
            'mise en corbeille massive'
        );
    }

    /**
     * Restauration massive
     */
    public static function toutRestaurer($table)
    {
        self::actionMassive(
            $table,
            'restauration massive'
        );
    }
}
