<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $primaryKey = 'autor_id';

    protected $fillable = [
      'nombre',
      'nacionalidad',
      'fecha_nacimiento',
    ];

    public function libros(){
      return $this->belongsToMany(Libro::class, 'libros_x_autores', 'autor_id', 'libro_id');
    }

    public function nacionalidad(){
      return $this->belongsTo(Pais::class, 'paises', 'nacionalidad', 'pais_id');
    }
}
