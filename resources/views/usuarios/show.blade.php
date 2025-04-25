<!DOCTYPE html>
<html lang="es">
<head>
    <title>Datos del usuario</title>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <link rel="stylesheet" href="https://jdev-8.github.io/Biblioteca-CSS/css/main.css">
  </head>
<body>
  <div class="container-fluid login-container">
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
								<input class="form-control" type="text" name="nombre_usuario" value="{{ $usuario->nombre_usuario }}" disabled>
							</div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Primera Pregunta de Seguridad</label>
								<input class="form-control" type="text" name="primera_pregunta_seguridad" value="{{ $usuario->seguridad->primera_pregunta_seguridad}}" disabled>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Respuesta Primera Pregunta</label>
								<input class="form-control" type="text" name="respuesta_primera_pregunta_seguridad" value="{{ $usuario->seguridad->respuesta_primera_pregunta_seguridad}}" disabled>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Segunda Pregunta de Seguridad</label>
								<input class="form-control" type="text" name="segunda_pregunta_seguridad" value="{{ $usuario->seguridad->segunda_pregunta_seguridad}}" disabled>
							</div>
						</div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Respuesta Segunda Pregunta</label>
								<input class="form-control" type="text" name="respuesta_segunda_pregunta_seguridad" value="{{ $usuario->seguridad->respuesta_segunda_pregunta_seguridad}}" disabled>
							</div>
				    </div>
				  </div>
				</div>
			</fieldset>
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
