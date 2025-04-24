<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguridadUsuario extends Model
{
   use HasFactory;

    protected $table = 'seguridad_usuarios';

    protected $primaryKey = 'seguridad_usuario_id';

    protected $fillable = [
      'usuario_id',
      'primera_pregunta_seguridad',
      'respuesta_primera_pregunta_seguridad',
      'segunda_pregunta_seguridad',
      'respuesta_segunda_pregunta_seguridad',
    ];

    public function usuario(){
      return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
