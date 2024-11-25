<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['ref_reply', 'ref_message'];

    public function message()
    {
        return $this->belongsTo(Message::class, 'ref_message');
    }

    public function reply()
    {
        return $this->belongsTo(Message::class, 'ref_reply');
    }
}
