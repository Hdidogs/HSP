<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'ref_forum',
        'ref_user',
    ];
}
