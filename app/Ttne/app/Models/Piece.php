<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    /** @use HasFactory<\Database\Factories\PieceFactory> */
    use HasFactory;

      protected $fillable = [
        'user_id',
        'type_piece_id',
        'statut_piece_id',
        'numero',
        'fichier',
        'mime_type',
        'date_expiration',
        'commentaire',
        'supprimer',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // Propriétaire de la pièce
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Type de pièce (CNI, Passeport, Permis...)
    public function typePiece()
    {
        return $this->belongsTo(Parametre::class, 'type_piece_id');
    }

    // Statut de la pièce (En attente, Validée, Refusée...)
    public function statutPiece()
    {
        return $this->belongsTo(Parametre::class, 'statut_piece_id');
    }
}
