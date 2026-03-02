<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrateur extends Authenticatable
{
    use Notifiable;

    // Table associée
    protected $table = 'administrateurs';

    // Colonnes autorisées à l’insertion/mise à jour
    protected $fillable = [
        'nom',
        'email',
        'password',
    ];

    // Colonnes cachées lors de la sérialisation
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts automatiques
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}