<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <link rel="stylesheet" href="https://jdev-8.github.io/Biblioteca-CSS/css/main.css">
  </head>
<body>
  <div class="full-box login-container cover">
      <form action="{{ route('login') }}" method="POST" autocomplete="off" class="logInForm">
        @csrf
        <p class="text-center text-muted">
          <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
        </p>
        <p class="text-center text-muted text-uppercase">
          Inicia sesión con tu cuenta
        </p>
        <div class="form-group label-floating">
          <label class="control-label" for="nombre_usuario">Usuario</label>
          <input class="form-control" id="nombre_usuario" name="nombre_usuario" type="text" />
          <p class="help-block">Escribe tú nombre de usuario</p>
        </div>
        @error('nombre_usuario')
          <br><p class="help-block"><strong>{{ $message }}</strong></p>
        @enderror
        <div class="form-group label-floating">
          <label class="control-label" for="contrasenia">Contraseña</label>
          <input class="form-control" id="contrasenia" name="contrasenia" type="password" />
          <p class="help-block">Escribe tú contraseña</p>
        </div>
        @error('nombre_usuario')
          <br><p class="help-block"><strong>{{ $message }}</strong></p>
        @enderror
        <div class="form-group text-center">
          <input
            type="submit"
            value="Iniciar sesión"
            class="btn btn-info"
            style="color: #fff"
          />
        </div>
        <a class="control-label" href="{{ route('reset-password') }}">¿Olvidaste tu contraseña?</a>
        <br>
        <a class="control-label" href="{{ route('register') }}">¿No te has registrado? ¡Registrate!</a>
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
