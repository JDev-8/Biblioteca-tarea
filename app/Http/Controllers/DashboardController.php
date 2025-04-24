<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\PrestamoLibro;
use App\Models\Autor; 
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas de libros por categoría
        $categorias = Categoria::withCount('libros')->get();
        $labelsCategorias = $categorias->pluck('nombre');
        $dataCategorias = $categorias->pluck('libros_count');

        // Estadísticas de libros más populares (top 5 por cantidad de préstamos)
        $librosPopulares = PrestamoLibro::select('libro_id', DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->orderByDesc('total_prestamos')
            ->limit(5)
            ->with('libro') // Carga la información del libro relacionado
            ->get();

        $labelsPopulares = $librosPopulares->pluck('libro.titulo');
        $dataPopulares = $librosPopulares->pluck('total_prestamos');

        // Cantidad total de usuarios
        $totalUsuarios = Usuario::count();

         // Cantidad total de libros
        $totalLibros = Libro::count();

        // Cantidad total de autores
        $totalAutores = Autor::count();

        return view('dashboard', compact(
            'labelsCategorias',
            'dataCategorias',
            'labelsPopulares',
            'dataPopulares',
            'totalUsuarios',
            'totalLibros',
            'totalAutores'
        ));
    }
}