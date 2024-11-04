<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['ref_user', 'downvote', 'upvote', 'libelle', 'ref_post'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'ref_post');
    }
}
