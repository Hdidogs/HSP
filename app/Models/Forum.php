<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    // Définit les champs qui peuvent être assignés en masse
    protected $fillable = ['nom', 'ref_user'];

    // Définit la relation avec le modèle Message
    public function messages()
    {
        return $this->hasMany(Message::class, 'ref_forum');
    }

    // Définit la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }
}