@extends('layouts.app')

@section('title', 'Actualizar Prestamo')

@section('content')
  <div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>ACTUALIZAR PRESTAMO</small></h1>
		</div>
		<p class="lead"></p>
	</div>
		
	<!-- Panel nuevo libro -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ACTUALIZAR AUTOR</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('prestamos.update', $prestamo->prestamos_libros_id) }}" method="POST">
          @csrf
          @method('PUT')
					<fieldset>
						<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Lector</label>
										<select class="form-control" type="text" name="lector_id" required>
                      @foreach ($lectores as $lector)
                        <option value="{{ $lector->usuario_id }}">{{ $lector->nombre }} {{ $lector->apellido }}<option>
                      @endforeach
                    </select>
								  </div>
				    		</div>
								<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Libro</label>
										<select class="form-control" type="text" name="libro_id" required>
                      @foreach ($libros as $libro)
                        <option value="{{ $libro->libro_id }}">{{ $libro->titulo }}<option>
                      @endforeach
                    </select>
								  </div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Fecha de Préstamo</label>
										<input  class="form-control" type="date" name="fecha_prestamo" value="{{ $prestamo->fecha_prestamo }}" required>
									</div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Fecha de Devolución</label>
										<input  class="form-control" type="date" name="fecha_devolucion" value="{{ $prestamo->fecha_devolucion }}" required>
									</div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Estado</label>
										<input  class="form-control" type="text" name="estado" value="{{ $prestamo->estado }}" required>
										<input  class="form-control" type="hidden" name="usuario_bibliotecario_id" value="{{ $usuario }}" required>
									</div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Renovacion</label>
										<input  class="form-control" type="text" name="renovaciones" value="{{ $prestamo->renovaciones }}" required>
									</div>
				    		</div>
				    	</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 20px;">
					  <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Actualizar</button>
					</p>
				</form>
			</div>
			</div>
		</div>
@endsection