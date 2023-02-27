<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ListaItem extends Model
{
    use HasFactory;
    protected $table = 'lista_items';
    protected $primaryKey = 'id';
    public $timestamps = true;
    use SoftDeletes; /*borrado suave de laravel*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];

    public static function rules(Request $request, $id = null)
    {

        $rules = [
            'nombre' => 'required|string',
        ];
        return $rules;
    }

    public function scopeByProfile($query, $userData, $id)
    {
        if ($userData->perfil_id == 3 && $id == 2)
            return $query->whereNotIn('lista_items.id', [4, 5, 12]);
    } 
}