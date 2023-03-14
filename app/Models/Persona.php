<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    use SoftDeletes;
    protected $fillable = [
        'codigo_persona',
        'nombre_persona',
        'apellido_persona',
        'correo_corporativo'
    ];	

    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public static $directionOrder = ['ASC','ASC']; 

    public function practicas()
    {
        return $this->belongsToMany(Practica::class, 'persona_practicas');
    } 

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'persona_proyectos');
    } 
    
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'persona_skills');
    }  
    
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'persona_roles');
    }     
    
    /*public function practicas()
    {
        return $this->belongsToMany(
            Practica::class,
            'persona_practicas',
            'personas_id',
            'practicas_id'
        );
    }  */  
}