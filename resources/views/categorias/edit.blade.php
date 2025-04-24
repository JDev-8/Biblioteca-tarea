@extends('layouts.app')

@section('title', 'Actualizar Categoria')

@section('content')
  <div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>ACTUALIZAR CATEGORIA</small></h1>
		</div>
		<p class="lead"></p>
	</div>
		
	<!-- Panel nuevo libro -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ACTUALIZAR CATEGORIA</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('categorias.update', $categoria->categoria_id) }}" method="POST">
          @csrf
          @method('PUT')
					<fieldset>
						<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
								    <div class="form-group label-floating">
										  <label class="control-label">Nombre</label>
										  <input class="form-control" type="text" name="nombre"  value="{{ $categoria->nombre }}"required>
									  </div>
				    			</div>
								<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Descripción</label>
										<textarea class="form-control" type="text" name="descripcion" required>{{ $categoria->descripcion }}</textarea>
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