<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){
      $usuarios = Usuario::where('rol', 'administrador')->get();
      return view('usuarios.administradores', compact('usuarios'));
    }

    public function bibliotecarios(){
      $usuarios = Usuario::where('rol', 'bibliotecario')->get();
      return view('usuarios.bibliotecarios', compact('usuarios'));
    }

    public function lectores(){
      $usuarios = Usuario::where('rol', 'lector')->get();
      return view('usuarios.lectores', compact('usuarios'));
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create(){
      return view('usuarios.create');
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
      Usuario::create($request->all());
      return redirect()->route('usuarios.index');
    }

    /**
      * Display the specified resource.
      *
      * @param  \App\Models\Usuario  $usuario
      * @return \Illuminate\Http\Response
    */
    public function show(Usuario $usuario){
      return view('usuarios.show', compact('usuario'));
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Usuario  $usuario
      * @return \Illuminate\Http\Response
    */
    public function edit(Usuario $usuario){
      return view('usuarios.edit', compact('usuario'));
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Usuario  $usuario
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Usuario $usuario){
      $usuario->update($request->all());
      return redirect()->route('usuarios.index');
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\usuario  $usuario
      * @return \Illuminate\Http\Response
    */
    public function destroy(Usuario $usuario){
      $usuario->delete();
      return redirect()->route('usuarios.index');
    }
}
