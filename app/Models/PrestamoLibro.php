<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamoLibro extends Model
{
    use HasFactory;

    protected $table = 'prestamos_libros';

    protected $primaryKey = 'prestamos_libros_id';

    protected $fillable = [
      'lector_id',
      'libro_id',
      'fecha_prestamo',
      'fecha_devolucion',
      'estado',
      'usuario_bibliotecario_id',
      'renovaciones',
    ];

    public function lector(){
      return $this->belongsTo(Usuario::class, 'lector_id', 'usuario_id');
    }

    public function libro(){
      return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function bibliotecario(){
      return $this->belongsTo(Usuario::class, 'usuario_bibliotecario_id');
    }
}
