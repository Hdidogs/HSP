<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'ref_user'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'ref_forum');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }
}