<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['ref_user', 'downvote', 'upvote', 'libelle', 'ref_forum'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function post()
    {
        return $this->belongsTo(Forum::class, 'ref_forum');
    }

    public function replies()
    {
        return $this->belongsToMany(
            Message::class, // Le modèle lié est lui-même Message
            'replies',      // Nom de la table pivot
            'ref_message',  // Clé étrangère dans la table pivot qui réfère le message "parent"
            'ref_reply'     // Clé étrangère qui réfère le message "réponse"
        );
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($message) {
            $message->replies()->delete();
        });
    }
}
