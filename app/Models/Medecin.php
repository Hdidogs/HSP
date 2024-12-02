<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_user',
        'ref_specialite',
        'ref_hopital',
        'ref_etablissement',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class, 'ref_specialite');
    }

    public function hopital()
    {
        return $this->belongsTo(Hopital::class, 'ref_hopital');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'ref_etablissement');
    }
}
