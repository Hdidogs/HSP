<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;

    protected $table = 'hopitaux';

    protected $fillable = [
        'nom',
        'rue',
        'ville',
        'adresse',
        'cp',
    ];
}
