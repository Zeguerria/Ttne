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
    )
    {
        if (!is_object($record)) {
            return;
        }

        $user = Auth::user();

        Historique::create([
            'user_id' => $user?->id,
            'record_type' => get_class($record),
            'record_id' => $record->id ?? null,
            'record_name' => self::getRecordName($record),
            'action' => $action,
            'ancienne_valeur' => $ancienneValeur,
            'nouvelle_valeur' => $nouvelleValeur,
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
            ?? 'N/A';
    }

    // =========================================================
    // ACTIONS SIMPLIFIÉES (UTILISATION RAPIDE)
    // =========================================================

    public static function creer($record)
    {
        self::enregistrer($record, 'création');
    }

    public static function modifier($record, array $old = null, array $new = null)
    {
        self::enregistrer($record, 'modification', $old, $new);
    }

    public static function supprimer($record)
    {
        self::enregistrer($record, 'suppression');
    }

    public static function miseEnCorbeille($record)
    {
        self::enregistrer($record, 'mise en corbeille');
    }

    public static function restauration($record)
    {
        self::enregistrer($record, 'restauration');
    }

    public static function suppressionDefinitive($record)
    {
        self::enregistrer(
            $record,
            'suppression définitive',
            $record?->toArray()
        );
    }

    // =========================================================
    // ACTIONS MASSIVES
    // =========================================================

    public static function actionMassive(string $table, string $action)
    {
        $user = Auth::user();

        Historique::create([
            'user_id' => $user?->id,
            'record_type' => $table,
            'record_id' => null,
            'record_name' => null,
            'action' => $action,
            'ancienne_valeur' => null,
            'nouvelle_valeur' => null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    public static function toutSupprimer($table)
    {
        self::actionMassive($table, 'suppression massive');
    }

    public static function toutMettreEnCorbeille($table)
    {
        self::actionMassive($table, 'mise en corbeille massive');
    }

    public static function toutRestaurer($table)
    {
        self::actionMassive($table, 'restauration massive');
    }
}
