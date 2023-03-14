<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaProyectos extends Model
{
    use HasFactory;
    protected $table = 'persona_proyectos';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'persona_id', 'proyecto_id','estado'
    ];
    
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }    

}