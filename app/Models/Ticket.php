<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'objet',
        'description',
        'ref_user',
        'ref_importance',
        'ref_gestionnaire',
        'date',
    ];

    public function importance()
    {
        return $this->belongsTo(Importance::class, 'ref_importance');
    }

    public function gestionnaire()
    {
        return $this->belongsTo(User::class, 'ref_gestionnaire');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'ref_user');
    }
}
