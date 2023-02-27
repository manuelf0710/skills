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
}