<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaPracticas extends Model
{
    protected $table = 'persona_practicas';
    
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'persona_id', 'practica_id','estado'
    ];
    
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }
    
    public function practica()
    {
        return $this->belongsTo(Practica::class, 'practica_id');
    }
}