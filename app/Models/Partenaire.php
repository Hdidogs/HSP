<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_user',
        'poste',
        'ref_entreprise',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'ref_entreprise');
    }
}
