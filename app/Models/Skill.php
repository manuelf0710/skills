<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'persona_skills');
    }       
}