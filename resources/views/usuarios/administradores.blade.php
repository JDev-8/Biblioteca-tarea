@extends('layouts.app')

@section('title', 'Lista de administradores')

@section('content')

  <div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="{{ route('usuarios.index') }}" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE ADMINISTRADORES
			  		</a>
			  	</li>
			</ul>
		</div>
  <div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Lista de administradores</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Nombre</th>
								<th class="text-center">Apellido</th>
								<th class="text-center">Cedula</th>
								<th class="text-center">Telefono</th>
								<th class="text-center">Fecha de nacimiento</th>
								<th class="text-center">Correo electrónico</th>
								<th class="text-center">Nombre de usuario</th>
								<th class="text-center">Rol</th>
								<th class="text-center">Activo</th>
                {{-- @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario') --}}
								  <th class="text-center">Acciones</th>
                {{-- @endif --}}
							</tr>
						</thead>
						<tbody>
              @foreach ($usuarios as $usuario)
							<tr>
								<td>{{ $usuario->usuario_id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->apellido }}</td>
                <td>{{ $usuario->cedula }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->correo_electronico }}</td>
                <td>{{ $usuario->fecha_nacimiento }}</td>
                <td>{{ $usuario->nombre_usuario }}</td>
                <td>{{ $usuario->rol }}</td>
                <td>{{ $usuario->activo}}</td>
                <td>
                  @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
                    <a href="{{ route('usuarios.edit', $usuario->usuario_id) }}" class="btn btn-success btn-raised btn-xs">
                      <i class="zmdi zmdi-refresh"></i>
                    </a>
                    <form action="{{ route('usuarios.destroy', $usuario->usuario_id) }}" method="POST" style="display: inline;">
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