<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    /**
     * Les champs autorisés pour l'insertion (Mass Assignment)
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'date_naissance',
        'niveau',
        'filiere',
        'groupe',
        'user_id',
        'planning_id',
    ];

    /**
     * Champs cachés lors des réponses JSON
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Casts automatiques
     */
    protected $casts = [
        'date_naissance' => 'date',
    ];

    /* =======================
       RELATIONS ELOQUENT
       ======================= */

    /**
     * Un étudiant appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un étudiant appartient à un planning
     */
    public function planning()
    {
        return $this->belongsTo(Planning::class);
    }
}
