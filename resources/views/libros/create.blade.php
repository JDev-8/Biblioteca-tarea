@extends('layouts.app')

@section('title', 'Crear Libro')

@section('content')
  <div class="container-fluid">
		<div class="page-header">
			<h1 class="text-titles"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Administración <small>NUEVO LIBRO</small></h1>
		</div>
		<p class="lead"></p>
	</div>
		
	<!-- Panel nuevo libro -->
	<div class="container-fluid">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO LIBRO</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('libros.store') }}" enctype="multipart/form-data" method="POST">
          @csrf
					<fieldset>
						<legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
								    <div class="form-group label-floating">
										  <label class="control-label">Título</label>
										  <input class="form-control" type="text" name="titulo" required>
									  </div>
				    			</div>
								<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">ISBN</label>
										<input class="form-control" type="text" name="ISBN" required>
									</div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Categorias</label>
										<select class="form-control" type="text" name="categoria_id" required>
                      @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}<option>
                      @endforeach
                    </select>
								  </div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Autores</label>
										<select class="form-control" type="text" name="autores" required>
                      @foreach ($autores as $autor)
                        <option value="{{ $autor->autor_id }}">{{ $autor->nombre }}<option>
                      @endforeach
                    </select>
								  </div>
				    		</div>
				    		<div class="col-xs-12 col-sm-6">
								  <div class="form-group label-floating">
										<label class="control-label">Fecha de publicación</label>
										<input  class="form-control" type="date" name="fecha_publicacion" required>
									</div>
				    		</div>
				    			<div class="col-xs-12 col-sm-6">
								    <div class="form-group label-floating">
										  <label class="control-label">Editorial</label>
										  <input class="form-control" type="text" name="editorial" required>
										</div>
				    			</div>
				    			<div class="col-xs-12 col-sm-6">
								    <div class="form-group label-floating">
										  <label class="control-label">Numero de copias</label>
										  <input  class="form-control" type="text" name="numero_copias" required>
										</div>
				    			</div>
				    			<div class="col-xs-12 col-sm-6">
								    <div class="form-group label-floating">
										  <label class="control-label">Disponibilidad</label>
										  <input  class="form-control" type="text" name="disponibilidad" required>
										</div>
				    			</div>
                  <div class="col-xs-12">
		    					  <div class="form-group">
		    						  <span class="control-label">Imágen</span>
									    <input type="file" name="imagen_portada" accept=".jpg, .png, .jpeg" required>
									    <div class="input-group">
										    <input type="text" readonly="" name="imagen_portada" class="form-control" placeholder="Elija la imágen...">
										    <span class="input-group-btn input-group-sm">
                          <button type="button" class="btn btn-fab btn-fab-mini">
                            <i class="zmdi zmdi-attachment-alt"></i>
                          </button>
										    </span>
									    </div>
									    <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
								    </div>
								  </div>
                  <div class="col-xs-12">
										<div class="form-group label-floating">
										  <label class="control-label">Resumen</label>
										  <textarea name="resumen" class="form-control" rows="3" required></textarea>
										</div>
				    			</div>
								</div>
				    			<div class="col-xs-12 col-sm-6">
								    <div class="form-group label-floating">
										  <label class="control-label">Idioma</label>
										  <input  class="form-control" type="text" name="idioma" required>
										</div>
				    			</div>
				    			<div class="col-xs-12 col-sm-6">
								    <div class="form-group label-floating">
										  <label class="control-label">Edición</label>
										  <input  class="form-control" type="text" name="edicion" required>
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