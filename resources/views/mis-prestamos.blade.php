@extends('layouts.app')

@section('title', 'Lista de prestamos')

@section('content')

  <div class="container-fluid">
			<ul class="breadcrumb breadcrumb-tabs">
			  	<li>
			  		<a href="{{ route('prestamos.index') }}" class="btn btn-success">
			  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PRESTAMOS
			  		</a>
			  	</li>
			</ul>
		</div>
  <div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Lista de prestamos</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Lector</th>
								<th class="text-center">Libro</th>
								<th class="text-center">Fecha de Préstamo</th>
								<th class="text-center">Fecha de devolución</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Bibliotecario</th>
								<th class="text-center">Renovaciones</th>
							</tr>
						</thead>
						<tbody>
              @foreach ($prestamos as $prestamo)
							<tr>
								<td>{{ $prestamo->prestamos_libros_id }}</td>
								<td>{{ $prestamo->lector->nombre }} {{ $prestamo->lector->apellido}}</td>
								<td>{{ $prestamo->libro->titulo }}</td>
								<td>{{ $prestamo->fecha_prestamo }}</td>
								<td>{{ $prestamo->fecha_devolucion }}</td>
								<td>{{ $prestamo->estado }}</td>
								<td>{{ $prestamo->bibliotecario->nombre }}</td>
								<td>{{ $prestamo->renovaciones }}</td>
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