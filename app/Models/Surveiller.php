<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveiller extends Model
{
    use HasFactory;
    protected $fillable = ['enseignant_id','examen_id'];
    public function enseignant() { return $this->belongsTo(Enseignant::class); }
    public function examen() { return $this->belongsTo(Examen::class); }
}

