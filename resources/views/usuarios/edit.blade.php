<!DOCTYPE html>
<html lang="es">
<head>
    <title>Actualizar usuario</title>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  </head>
<body>
  <div class="container-fluid login-container">
		<form action="{{ route('usuarios.update', $usuario->usuario_id) }}" enctype="multipart/form-data" method="POST" autocomplete="off">
      @method('PUT')
      @csrf
      @if (Auth::user()->rol === 'administrador' && Auth::user()->usuario_id != $usuario->usuario_id)
			<fieldset>
				<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
				<div class="container-fluid">
				  <div class="row">
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Nombre</label>
								<input  class="form-control" type="text" name="nombre" value="{{ $usuario->nombre }}" disabled>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Apellido</label>
								<input class="form-control" type="text" name="apellido" value="{{ $usuario->apellido }}" disabled>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Cédula</label>
								<input class="form-control" type="text" name="cedula" value="{{ $usuario->cedula }}" disabled>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Teléfono</label>
								<input class="form-control" type="text" name="telefono" value="{{ $usuario->telefono }}" disabled>
							</div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Correo eléctronico</label>
								<input class="form-control" type="text" name="correo_electronico" value="{{ $usuario->correo_electronico }}" disabled>
							</div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Fecha de nacimiento</label>
								<input class="form-control" type="date" name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}" disabled>
							</div>
				    </div>
				    <div class="col-xs-12">
							<div class="form-group label-floating">
								<label class="control-label">Rol</label>
								<input class="form-control" type="text" name="rol" required>
							</div>
				    </div>
				  </div>
				</div>
			</fieldset>
      @endif
      @if (Auth::user()->usuario_id === $usuario->usuario_id)
      <fieldset>
				<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
				<div class="container-fluid">
				  <div class="row">
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Nombre</label>
								<input  class="form-control" type="text" name="nombre" value="{{ $usuario->nombre }}" required>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Apellido</label>
								<input class="form-control" type="text" name="apellido" value="{{ $usuario->apellido }}" required>
						  </div>
				    </div>
            <div class="col-xs-12">
		    			<div class="form-group">
		    				<span class="control-label">Imágen</span>
								<input type="file" name="imagen_usuario" accept=".jpg, .png, .jpeg" required>
								<div class="input-group">
									<input type="text" readonly="" class="form-control" value="{{ $usuario->imagen_usuario }}" placeholder="Elija la imágen...">
									<span class="input-group-btn input-group-sm">
                    <button type="button" class="btn btn-fab btn-fab-mini">
                      <i class="zmdi zmdi-attachment-alt"></i>
                    </button>
									</span>
								</div>
							  <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Cédula</label>
								<input class="form-control" type="text" name="cedula" value="{{ $usuario->cedula }}" required>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Teléfono</label>
								<input class="form-control" type="text" name="telefono" value="{{ $usuario->telefono }}" required>
							</div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Correo eléctronico</label>
								<input class="form-control" type="text" name="correo_electronico" value="{{ $usuario->correo_electronico }}" required>
							</div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Fecha de nacimiento</label>
								<input class="form-control" type="date" name="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}" required>
							</div>
				    </div>
				  </div>
				</div>
			</fieldset>
			<br>
			<fieldset>
				<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
				<div class="container-fluid">
				  <div class="row">
				    <div class="col-xs-12">
							<div class="form-group label-floating">
								<label class="control-label">Nombre de usuario</label>
								<input class="form-control" type="text" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}" required>
							</div>
				    </div>
				    <div class="col-xs-12">
							<div class="form-group label-floating">
								<label class="control-label">Contraseña</label>
								<input class="form-control" type="password" name="contrasenia" required>
							</div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Primera Pregunta de Seguridad</label>
								<input class="form-control" type="text" name="primera_pregunta_seguridad" value="{{ $usuario->seguridad->primera_pregunta_seguridad}}" required>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Respuesta Primera Pregunta</label>
								<input class="form-control" type="text" name="respuesta_primera_pregunta_seguridad" value="{{ $usuario->seguridad->respuesta_primera_pregunta_seguridad}}" required>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Segunda Pregunta de Seguridad</label>
								<input class="form-control" type="text" name="segunda_pregunta_seguridad" value="{{ $usuario->seguridad->segunda_pregunta_seguridad}}" required>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Respuesta Segunda Pregunta</label>
								<input class="form-control" type="text" name="respuesta_segunda_pregunta_seguridad" value="{{ $usuario->seguridad->respuesta_segunda_pregunta_seguridad}}" required>
							</div>
				    </div>
				  </div>
				</div>
			</fieldset>
      @endif
			<p class="text-center" style="margin-top: 20px;">
			  <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Actualizar</button>
			</p>
		</form>
	</div>
  <!--====== Scripts -->
  <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/material.min.js') }}"></script>
  <script src="{{ asset('js/ripples.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script>
    $.material.init();
  </script>
</body>
</html>