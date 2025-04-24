@extends('layouts.app')

@section('title', 'Lista de Libros')

@section('content')

  <div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
            @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
              <a href="{{ route('libros.create') }}" class="btn btn-info">
			  			  <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO LIBRO
			  		  </a>
            @endif
			  	</li>
			  	<li>
            @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
              <a href="{{ route('libros.pdf') }}" class="btn btn-info">
			  			  <i class="zmdi zmdi-plus"></i> &nbsp; IMPRMIR TABLA
			  		  </a>
            @endif
			  	</li>
			  	<li>
			  		<a href="{{ route('libros.index') }}" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE LIBROS
			  		</a>
			  	</li>
			</ul>
		</div>
  <div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Lista de libros</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Título</th>
								<th class="text-center">ISBN</th>
								<th class="text-center">Categoria</th>
								<th class="text-center">Fecha de publicación</th>
								<th class="text-center">Editorial</th>
								<th class="text-center">Portada</th>
								<th class="text-center">Autor</th>
                @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
								<th class="text-center">Acciones</th>
                @endif
							</tr>
						</thead>
						<tbody>
              @foreach ($libros as $libro)
							<tr>
								<td>{{ $libro->libro_id }}</td>
								<td>{{ $libro->titulo }}</td>
								<td>{{ $libro->ISBN }}</td>
								<td>{{ $libro->categoria->nombre }}</td>
								<td>{{ $libro->fecha_publicacion }}</td>
								<td>{{ $libro->editorial }}</td>
								<td>
                  <img src="{{ asset('storage/' . $libro->imagen_portada) }}" alt="Portada de {{ $libro->titulo }} " style="max-width: 100px; max-height: 150px;">
                </td>
                <td>
                  @foreach ($libro->autores as $autor)
                    {{ $autor->nombre }}<br>
                  @endforeach
                </td>
                <td>Prueba</td>
                <td>
                  <a href="{{ route('libros.show', $libro->libro_id) }}" class="btn btn-success btn-raised btn-xs">
                    <i class="zmdi zmdi-info"></i>
                  </a>
                  @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
                    <a href="{{ route('libros.edit', $libro->libro_id) }}" class="btn btn-success btn-raised btn-xs">
                      <i class="zmdi zmdi-refresh"></i>
                    </a>
                    <form action="{{ route('libros.destroy', $libro->libro_id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-raised btn-xs">
                        <i class="zmdi zmdi-delete"></i>
                      </button>
                    </form>
                  @endif
                </td>
							</tr>
              @endforeach
						</tbody>
					</table>
				</div>
				<nav class="text-center">
				  <ul class="pagination pagination-sm">
						<li class="disabled"><a href="javascript:void(0)">«</a></li>
						<li class="active"><a href="javascript:void(0)">1</a></li>
						<li><a href="javascript:void(0)">2</a></li>
						<li><a href="javascript:void(0)">3</a></li>
						<li><a href="javascript:void(0)">4</a></li>
						<li><a href="javascript:void(0)">5</a></li>
						<li><a href="javascript:void(0)">»</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
@endsection