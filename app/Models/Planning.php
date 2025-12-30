<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function etudiants() { return $this->hasMany(Etudiant::class); }
    public function enseignants() { return $this->hasMany(Enseignant::class); }
    public function examens() { return $this->hasMany(Examen::class); }
    public function consulters() { return $this->hasMany(Consulter::class); }
}

