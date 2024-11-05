<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenementAvant extends Model
{
    use HasFactory;

    // Spécifie le nom de la table dans la base de données
    protected $table = 'evenementavant';

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = [
        'ref_evenement',
    ];

    // Définit la relation avec le modèle Evenement
    public function evenement()
    {
        return $this->belongsTo(Evenement::class, 'ref_evenement');
    }

    // Définit la relation avec le modèle Inscription
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'ref_evenement');
    }

    // Vérifie si un utilisateur est inscrit à l'événement
    public function isUserInscrit($userId)
    {
        return $this->inscriptions()->where('ref_user', $userId)->exists();
    }
}