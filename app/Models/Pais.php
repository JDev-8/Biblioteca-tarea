<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
  use HasFactory;

    protected $primaryKey = 'pais_id';

    protected $table = 'paises';

    protected $fillable = [
      'pais',
    ];

    public function libros(){
      return $this->hasMany(Autor::class, 'nacionalidad');
    }
}
