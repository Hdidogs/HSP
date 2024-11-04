<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_evenement',
        'ref_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }
}
