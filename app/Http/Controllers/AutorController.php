<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){
      $autores = Autor::all();
      return view('autores.index', compact('autores'));
    }

    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
    */
    public function create(){
      return view('autores.create');
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
      Autor::create($request->all());
      return redirect()->route('autores.index');
    }

    /**
      * Display the specified resource.
      *
      * @param  \App\Models\Autor  $autor
      * @return \Illuminate\Http\Response
    */
    public function show(Autor $autor){
      return view('autores.show', compact('autor'));
    }

    /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Autor  $autor
      * @return \Illuminate\Http\Response
    */
    public function edit(Autor $autor){
      return view('autores.edit', compact('autor'));
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Autor  $autor
      * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Autor $autor){
      $autor->update($request->all());
      return redirect()->route('autores.index');
    }

    /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Autor  $autor
      * @return \Illuminate\Http\Response
    */
    public function destroy(Autor $autor){
      $autor->delete();
      return redirect()->route('autores.index');
    }
}
