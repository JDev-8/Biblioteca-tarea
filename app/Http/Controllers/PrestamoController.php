<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use App\Models\Libro;
use App\Models\PrestamoLibro;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){
      $prestamos = PrestamoLibro::all();
      return view('prestamos.index', compact('prestamos'));
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create(){
      $lectores = Usuario::where('rol', 'lector')->get();
      $libros = Libro::all();
      $usuario = Auth::id();
      return view('prestamos.create', compact('lectores', 'libros', 'usuario'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
      PrestamoLibro::create($request->all());
      return redirect()->route('prestamos.index');
    }

    /**
      * Display the specified resource.
      *
      * @param  \App\Models\PrestamoLibro  $prestamo
      * @return \Illuminate\Http\Response
    */
    public function show(PrestamoLibro $prestamo){
      return view('prestamos.show', compact('prestamo'));
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\PrestamoLibro  $prestamo
      * @return \Illuminate\Http\Response
    */
    public function edit(PrestamoLibro $prestamo){
      $lectores = Usuario::where('rol', 'lector')->get();
      $libros = Libro::all();
      $usuarios = Usuario::all();
      return view('prestamos.edit', compact('prestamo', 'lectores', 'libros', 'usuarios'));
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\PrestamoLibro  $prestamo
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, PrestamoLibro $prestamo){
      $prestamo->update($request->all());
      return redirect()->route('prestamos.index');
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\PrestamoLibro  $prestamo
      * @return \Illuminate\Http\Response
    */
    public function destroy(PrestamoLibro $prestamo){
      $prestamo->delete();
      return redirect()->route('prestamos.index');
    }

    public function misPrestamos()
    {
        $lectorId = Auth::id();

        $prestamos = PrestamoLibro::where('lector_id', $lectorId)
            ->with('libro') // Carga la información del libro asociado al préstamo
            ->orderBy('fecha_prestamo', 'desc') // Ordena los préstamos por fecha de préstamo más reciente
            ->paginate(10); // Pagina los resultados (opcional)

        return view('mis-prestamos', compact('prestamos'));
    }
}
