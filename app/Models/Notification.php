<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['chef_id','responsable_id','enseignant_id','etudiant_id','status'];
    public function chef() { return $this->belongsTo(ChefDepartement::class,'chef_id'); }
    public function responsable() { return $this->belongsTo(Responsable::class,'responsable_id'); }
    public function enseignant() { return $this->belongsTo(Enseignant::class,'enseignant_id'); }
    public function etudiant() { return $this->belongsTo(Etudiant::class,'etudiant_id'); }
}
