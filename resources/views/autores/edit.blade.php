@extends('layouts.app')

@section('title', 'Actualizar Autor')

@section('content')
  <div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>ACTUALIZAR AUTOR</small></h1>
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
				<form action="{{ route('autores.update', $autor->autor_id) }}" method="POST">
          @csrf
          @method('PUT')
					<fieldset>
						<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
								    <div class="form-group label-floating">
										  <label class="control-label">Nombre</label>
										  <input class="form-control" type="text" name="nombre"  value="{{ $autor->nombre }}"required>
									  </div>
				    			</div>
								<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Nacionalidad</label>
										<input class="form-control" type="text" name="nacionalidad" value="{{ $autor->nacionalidad }}" required>
									</div>
				    		</div>
				    		{{-- <div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Categorias</label>
										<select class="form-control" type="text" name="categoria_id" required>
                      @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}<option>
                      @endforeach
                    </select>
								  </div>
				    		</div> --}}
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Fecha de Nacimiento</label>
										<input  class="form-control" type="date" name="fecha_nacimiento" value="{{ $autor->fecha_nacimiento }}" required>
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