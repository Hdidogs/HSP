<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'mission',
        'salaire',
        'ref_user'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function offre_user(){
        return $this->belongsToMany(User::class, 'offre_user', 'ref_offre', 'ref_user');
    }

    public function hasApplied(User $user)
    {
        return $this->offre_user()->where('ref_user', $user->id)->exists();
    }


}
