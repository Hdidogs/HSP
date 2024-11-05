<?php

namespace App\Models;

use App\Http\Controllers\AccueilController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiviteAvant extends Model
{
    use HasFactory;

    // Spécifie le nom de la table dans la base de données
    protected $table = 'activiteavant';

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = [
        'ref_activite',
    ];

    // Définit la relation avec le modèle Activite
    public function activite()
    {
        return $this->belongsTo(Activite::class, 'ref_activite');
    }
}