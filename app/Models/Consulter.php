<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulter extends Model
{
    use HasFactory;
    protected $fillable = ['planning_id','etudiant_id','type'];
    public function planning() { return $this->belongsTo(Planning::class); }
    public function etudiant() { return $this->belongsTo(Etudiant::class); }
}

