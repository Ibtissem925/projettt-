<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Responsable extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['nom','prenom','email','password'];
    protected $hidden = ['password','remember_token'];
    public function salles() { return $this->hasMany(Salle::class,'responsable_id'); }
    public function notifications() { return $this->hasMany(Notification::class); }
}
