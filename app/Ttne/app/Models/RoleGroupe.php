<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleGroupe extends Model
{
    /** @use HasFactory<\Database\Factories\RoleGroupeFactory> */
    use HasFactory;
    protected $fillable = [
    'nom',
    'code',
    'slug',
    'description',
    'supprimer',
    'active',
];

protected $casts = [
    'supprimer' => 'boolean',
    'active' => 'boolean',
];

}
