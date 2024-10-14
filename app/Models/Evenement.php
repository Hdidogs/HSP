<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'titre',
        'description',
        'adresse',
        'elementrequis',
        'nb_place',
        'date',
    ];
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'ref_evenement');
    }

    // Vérifier si un utilisateur est inscrit à cet événement
    public function isUserInscrit($userId)
    {
        return $this->inscriptions()->where('ref_user', $userId)->exists();
    }
}