<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroXAutor extends Model
{
  use HasFactory;

  protected $table = 'libros_x_autores';

  protected $primaryKey = 'libro_x_autor_id';

  protected $fillable = [
    'libro_id',
    'autor_id',
  ];

  public function libro(){
    return $this->belongsTo(Libro::class, 'libro_id');
  }

  public function autor(){
    return $this->belongsTo(Libro::class, 'autor_id');
  }
}
