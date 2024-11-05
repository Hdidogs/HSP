<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = ['titre', 'desc', 'nb_place', 'ref_user'];

    // Définit la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }
}