<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = [
        'nom', 'adresseweb', 'numero'
    ];
}