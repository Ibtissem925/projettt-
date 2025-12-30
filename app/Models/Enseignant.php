<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'filiere',
        'planning_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }
}