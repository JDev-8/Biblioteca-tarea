@extends('layouts.app')

@section('title', 'Crear Autor')

@section('content')
  <div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>NUEVO AUTOR</small></h1>
		</div>
		<p class="lead"></p>
	</div>
		
	<!-- Panel nuevo libro -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO AUTOR</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('autores.store') }}" method="POST">
          @csrf
					<fieldset>
						<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
								    <div class="form-group label-floating">
										  <label class="control-label">Nombre</label>
										  <input class="form-control" type="text" name="nombre" required>
									  </div>
				    			</div>
								<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Nacionalidad</label>
										<input class="form-control" type="text" name="nacionalidad" required>
									</div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Fecha de Nacimiento</label>
										<input  class="form-control" type="date" name="fecha_nacimiento" required>
									</div>
				    		</div>
				    	</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 20px;">
					  <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					</p>
				</form>
			</div>
			</div>
		</div>
@endsection