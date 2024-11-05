<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = [
        'type',
        'titre',
        'description',
        'adresse',
        'elementrequis',
        'nb_place',
        'date',
    ];

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

    // Définit la relation avec le modèle Organisation
    public function organisations()
    {
        return $this->hasMany(Organisation::class, 'ref_evenement');
    }

    // Vérifie si un utilisateur est le créateur de l'événement
    public function isUserCreator($userId)
    {
        return $this->organisations()->where('ref_user', $userId)->exists();
    }

    // Définit la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    // Nouvelle relation avec le modèle EvenementAvant
    public function evenementAvants()
    {
        return $this->hasMany(EvenementAvant::class, 'ref_evenement');
    }
}