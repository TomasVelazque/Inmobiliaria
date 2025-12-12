<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $table = "usuarios";

    protected $fillable = [
        'nombre_apellido',
        'gmail',
        'telefono',
        'clave',
        'estado',
        'fecha_creacion',
        'rol_id'
    ];

    public function rol(){
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
