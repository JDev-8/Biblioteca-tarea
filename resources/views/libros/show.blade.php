@extends('layouts.app')

@section('title', $libro->titulo)

@section('content')
  <div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> INFORMACIÓN LIBRO</small></h1>
		</div>
	</div>
		
		<!-- Panel info libro -->
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-info"></i> &nbsp; {{ $libro->titulo }}</h3>
				</div>
				<div class="panel-body">
					<fieldset>
						<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
							    	<div class="form-group label-floating">
									  	<span>Título</span>
									  	<input class="form-control" readonly="" value="{{ $libro->titulo }}">
									</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-6">
							    	<img src="{{ asset('storage/' . $libro->imagen_portada) }}" alt="book" class="img-responsive">
			    				</div>
			    				<div class="col-xs-12 col-sm-6">
							    	<div class="container-fluid">
							    		<div class="row">
						    				<div class="col-xs-12">
										    	<div class="form-group label-floating">
												  	<span>Autor</span>
												  	<input class="form-control" readonly="" value="{{ $libro->ISBN }}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Categoria</span>
												  	<input class="form-control" readonly="" value="{{ $libro->categoria->nombre}}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Fecha publicación</span>
												  	<input class="form-control" readonly="" value="{{ $libro->fecha_publicacion }}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Editorial</span>
												  	<input class="form-control" readonly="" value="{{ $libro->editorial }}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Número de copias</span>
												  	<input class="form-control" readonly="" value="{{ $libro->numero_copias }}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Disponibilidad</span>
												  	<input class="form-control" readonly="" value="{{ $libro->disponibilidad }}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Resumen</span>
									  	      <textarea readonly="" class="form-control" rows="3" >{{ $libro->resumen }}</textarea>
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Idioma</span>
												  	<input class="form-control" readonly="" value="{{ $libro->idioma }}">
												</div>
						    				</div>
						    				<div class="col-xs-12 col-sm-6">
										    	<div class="form-group label-floating">
												  	<span>Edición</span>
												  	<input class="form-control" readonly="" value="{{ $libro->edicion }}">
												</div>
						    				</div>
							    		</div>
							    	</div>
			    				</div>
							</div>
						</div>
					</fieldset>
					<br>
					<fieldset>
						<p class="text-center">
							<a href="{{ route('libros.index') }}" class="btn btn-raised btn-primary">
							<i class="zmdi zmdi-cloud-download"></i> &nbsp; Volver
							</a>
						</p>
					</fieldset>
				</div>
			</div>
		</div>
@endsection