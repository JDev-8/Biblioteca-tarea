<?php

namespace App\Models;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $primaryKey = 'libro_id';

    protected $fillable = [
      'titulo',
      'ISBN',
      'categoria_id',
      'fecha_publicacion',
      'editorial',
      'numero_copias',
      'disponibilidad',
      'imagen_portada',
      'resumen',
      'idioma',
      'edicion',
    ];

    public function categoria(){
      return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function autores(){
      return $this->belongsToMany(Autor::class, 'libros_x_autores', 'libro_id', 'autor_id');
    }

    public function prestamos(){
      return $this->hasMany(PrestamoLibro::class, 'libro_id');
    }
}
