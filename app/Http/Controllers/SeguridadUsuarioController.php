<?php

namespace App\Http\Controllers;

use App\Models\SeguridadUsuario;
use Illuminate\Http\Request;

class SeguridadUsuarioController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){
      $seguridadUsuarios = SeguridadUsuario::all();
      return view('seguridadUsuarios.index', compact('seguridadUsuarios'));
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create(){
      return view('seguridadUsuarios.create');
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
      SeguridadUsuario::create($request->all());
      return redirect()->route('seguridadUsuarios.index');
    }

    /**
      * Display the specified resource.
      *
      * @param  \App\Models\SeguridadUsuario  $seguridadUsuario
      * @return \Illuminate\Http\Response
    */
    public function show(SeguridadUsuario $seguridadUsuario){
      return view('seguridadUsuarios.show', compact('seguridadUsuario'));
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\SeguridadUsuario  $seguridadUsuario
      * @return \Illuminate\Http\Response
    */
    public function edit(SeguridadUsuario $seguridadUsuario){
      return view('seguridadUsuarios.edit', compact('seguridadUsuario'));
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\SeguridadUsuario  $seguridadUsuario
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, SeguridadUsuario $seguridadUsuario){
      $seguridadUsuario->update($request->all());
      return redirect()->route('seguridadUsuarios.index');
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\SeguridadUsuario  $seguridadUsuario
      * @return \Illuminate\Http\Response
    */
    public function destroy(SeguridadUsuario $seguridadUsuario){
      $seguridadUsuario->delete();
      return redirect()->route('seguridadUsuarios.index');
    }
}
