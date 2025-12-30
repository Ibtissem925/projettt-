<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = ['name','type','statut','module_id','planning_id'];
    public function module() { return $this->belongsTo(Module::class); }
    public function planning() { return $this->belongsTo(Planning::class); }
    public function passers() { return $this->hasMany(Passer::class); }
    public function surveillers() { return $this->hasMany(Surveiller::class); }
}
