<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';
    use SoftDeletes;

    protected $fillable = [
        'codigo_rol',
        'nombre_rol',
    ];	

    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at','updated_at','deleted_at'];
    public static $directionOrder = ['ASC','ASC']; 
    
    public function personas()
    {
        return $this->belongsToMany(Rol::class, 'persona_roles');
    } 
}