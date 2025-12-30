<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'localisation',
        'disponibilite',
        'capacity',
        'examen_id',
        'responsable_id',
    ];

    protected $casts = [
        'disponibilite' => 'boolean',
    ];

    public function examen()
    {
        return $this->belongsTo(Examen::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}