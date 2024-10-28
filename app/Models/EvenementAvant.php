<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenementAvant extends Model
{
    use HasFactory;

    protected $table = 'evenementavant';

    protected $fillable = [
        'ref_evenement',
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class , 'ref_evenement');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'ref_evenement');
    }

    public function isUserInscrit($userId)
    {
        return $this->inscriptions()->where('ref_user', $userId)->exists();
    }
}
