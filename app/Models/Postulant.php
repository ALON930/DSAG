<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulant extends Model
{
    use HasFactory;

    protected $table = 'postulants';

    protected $fillable = [
        'nom',
        'prenoms',
        'adresse',
        'email',
        'telephone',
        'password',
        'dispo',
        'niveau',
        'PC',
        'Droits_de_formation',
    ];
}