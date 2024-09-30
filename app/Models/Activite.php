<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'desc', 'nb_place', 'ref_user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }
}

