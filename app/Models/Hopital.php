<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;

    // Spécifie le nom de la table dans la base de données
    protected $table = 'hopitaux';

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = [
        'nom',
        'rue',
        'ville',
        'adresse',
        'cp',
    ];
}