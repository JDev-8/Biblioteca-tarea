<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LibroController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){
      $libros = Libro::all();
      return view('libros.index', compact('libros'));
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create(){
      $categorias = Categoria::all();
      $autores = Autor::all();
      return view('libros.create', compact('categorias', 'autores'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
      $data = $request->except('imagen_portada');
      if ($request->hasFile('imagen_portada')) {
        $titulo = Str::slug($request->titulo);
        $extension = $request->file('imagen_portada')->getClientOriginalExtension();
        $nombreArchivo = $titulo . '.' . $extension;
        $path = $request->file('imagen_portada')->storeAs('libros', $nombreArchivo, 'public');
        $data['imagen_portada'] = $path;
      }
      /* $libro = Libro::create($request->all()); */
      $libro = Libro::create($data);
      if ($request->has('autores')) {
        $libro->autores()->attach($request->autores);
      }
      return redirect()->route('libros.index');
    }

    public function pdf(){
      $libros = Libro::all();
      $pdf = Pdf::loadView('libros.pdf', compact('libros'));
      return $pdf->stream();
    }

    /**
      * Display the specified resource.
      *
      * @param  \App\Models\Libro  $libro
      * @return \Illuminate\Http\Response
    */
    public function show(Libro $libro){
      return view('libros.show', compact('libro'));
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Libro  $libro
      * @return \Illuminate\Http\Response
    */
    public function edit(Libro $libro){
      $categorias = Categoria::all();
      $autores = Autor::all();
      return view('libros.edit', compact('libro', 'categorias', 'autores'));
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Libro  $libro
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Libro $libro){
      $libro->update($request->all());
      return redirect()->route('libros.index');
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Libro  $libro
      * @return \Illuminate\Http\Response
    */
    public function destroy(Libro $libro){
      $libro->delete();
      return redirect()->route('libros.index');
    }
}
