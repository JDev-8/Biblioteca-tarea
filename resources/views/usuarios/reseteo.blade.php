<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrar usuario</title>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <link rel="stylesheet" href="https://jdev-8.github.io/Biblioteca-CSS/css/main.css">
  </head>
<body>
  <div class="container-fluid login-container">
		<form autocomplete="off">
      @csrf
			<fieldset>
				<legend><i class="zmdi zmdi-key"></i> &nbsp; Restablecer contraseña</legend>
				<div class="container-fluid">
				  <div class="row">
				    <div class="col-xs-12">
							<div class="form-group label-floating">
								<label class="control-label">Nombre de Usuario</label>
								<input  class="form-control" type="text" name="nombre_usuario" required>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Respuesta Primera Pregunta</label>
								<input class="form-control" type="text" name="respuesta_primera_pregunta_seguridad" required>
						  </div>
				    </div>
				    <div class="col-xs-12 col-sm-6">
						  <div class="form-group label-floating">
								<label class="control-label">Respuesta Segunda Pregunta</label>
								<input class="form-control" type="text" name="respuesta_segunda_pregunta_seguridad" required>
						  </div>
				    </div>
            <div class="col-xs-12">
							<div class="form-group label-floating">
								<label class="control-label">Nueva contraseña</label>
								<input class="form-control" type="password" name="nueva_contrasenia" required>
							</div>
				    </div>
				  </div>
				</div>
			</fieldset>
			<p class="text-center" style="margin-top: 20px;">
			  <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Restablecer Contraseña</button>
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
