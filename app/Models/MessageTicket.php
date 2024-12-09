<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageTicket extends Model
{
    use HasFactory;
    protected $table = 'messagesticket';


    protected $fillable = [
        'libelle',
        'ref_user',
        'ref_ticket',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ref_ticket');
    }
}
