@extends('layouts.app')

@section('title', 'Lista de autores')

@section('content')

  <div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
            @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
              <a href="{{ route('autores.create') }}" class="btn btn-info">
			  			  <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO AUTOR
			  		  </a>
            @endif
			  	</li>
			  	<li>
			  		<a href="{{ route('autores.index') }}" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE AUTORES
			  		</a>
			  	</li>
			</ul>
		</div>
  <div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Lista de autores</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Nacionalidad</th>
								<th class="text-center">Fecha de Nacimiento</th>
                @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
								  <th class="text-center">Acciones</th>
                @endif
							</tr>
						</thead>
						<tbody>
              @foreach ($autores as $autor)
							<tr>
								<td>{{ $autor->autor_id }}</td>
								<td>{{ $autor->nombre }}</td>
								<td>{{ $autor->nacionalidad }}</td>
								<td>{{ $autor->fecha_nacimiento }}</td>
                <td>
                  @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
                    <a href="{{ route('autores.edit', $autor->autor_id) }}" class="btn btn-success btn-raised btn-xs">
                      <i class="zmdi zmdi-refresh"></i>
                    </a>
                    <form action="{{ route('autores.destroy', $autor->autor_id) }}" method="POST" style="display: inline;">
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