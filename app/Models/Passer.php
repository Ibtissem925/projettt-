<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passer extends Model
{
    use HasFactory;
    protected $table = 'passer';
    protected $fillable = ['etudiant_id','examen_id','salle_id'];
    public function etudiant() { return $this->belongsTo(Etudiant::class); }
    public function examen() { return $this->belongsTo(Examen::class); }
    public function salle() { return $this->belongsTo(Salle::class); }
}
