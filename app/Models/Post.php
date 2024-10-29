<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'ref_user', 'ref_forum'];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'ref_forum');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'ref_post');
    }
}