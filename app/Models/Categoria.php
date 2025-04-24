<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'categoria_id';

    protected $table = 'categorias';

    protected $fillable = [
      'nombre',
      'descripcion',
    ];

    public function libros(){
      return $this->hasMany(Libro::class, 'categoria_id');
    }
}
