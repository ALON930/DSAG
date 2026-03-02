<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Compte extends Authenticatable
{
    use Notifiable;

    protected $table = 'comptes';

    protected $fillable = [
        'nom',
        'prenoms',
        'adresse',
        'email',
        'telephone',
        'password',
    ];

    // Hash automatique du mot de passe
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}