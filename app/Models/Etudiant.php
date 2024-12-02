<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_user',
        'cv',
        'etude',
        'ref_etablissement',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'ref_etablissement');
    }
}
