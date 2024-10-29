<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'ref_forum');
    }
}