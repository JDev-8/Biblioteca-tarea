<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'usuario_id';

    protected $fillable = [
      'nombre',
      'apellido',
      'imagen_usuario',
      'cedula',
      'telefono',
      'fecha_nacimiento',
      'correo_electronico',
      'nombre_usuario',
      'contrasenia',
      'rol',
      'activo',
    ];

    protected $hidden = [
      'contrasenia',
    ];

    public function prestamosRealizados(){
      return $this->hasMany(PrestamoLibro::class, 'usuario_bibliotecario_id');
    }

    public function prestamos(){
      return $this->hasMany(PrestamoLibro::class, 'lector_id');
    }

    public function seguridad(){
      return $this->hasOne(SeguridadUsuario::class, 'usuario_id');
    }
}
