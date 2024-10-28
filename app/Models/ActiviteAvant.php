<?php

namespace App\Models;

use App\Http\Controllers\AccueilController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiviteAvant extends Model
{
    use HasFactory;

    protected $table = 'activiteavant';

    protected $fillable = [
        'ref_activite',
    ];

    public function activite()
    {
        return $this->belongsTo(Activite::class , 'ref_activite');
    }
}
