<!DOCTYPE html>
<html lang="es">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <!-- SideBar -->
    <section class="full-box cover dashboard-sideBar">
      <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
      <div class="full-box dashboard-sideBar-ct">
        <!--SideBar Title -->
        <div
          class="full-box text-uppercase text-center text-titles dashboard-sideBar-title"
        >
          Biblioteca <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
        </div>
        <!-- SideBar User info -->
        <div class="full-box dashboard-sideBar-UserInfo">
          <figure class="full-box">
            <img src="{{ asset('storage/usuarios/' . Auth::user()->imagen_usuario) }}" alt="{{ Auth::user()->nombre }}" />
            <figcaption class="text-center text-titles">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</figcaption>
          </figure>
          <ul class="full-box list-unstyled text-center">
            <li>
              <a href="{{ route('usuarios.show', Auth::user()->usuario_id) }}" title="Mis datos">
                <i class="zmdi zmdi-account-circle"></i>
              </a>
            </li>
            <li>
              <a href="{{ route('usuarios.edit', Auth::user()->usuario_id) }}" title="Mi cuenta">
                <i class="zmdi zmdi-settings"></i>
              </a>
            </li>
            <li>
              <a href="{{ route('logout') }}" title="Salir del sistema" class="btn-exit-system">
                <i class="zmdi zmdi-power"></i>
              </a>
            </li>
          </ul>
        </div>
        <!-- SideBar Menu -->
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
          @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
          <li>
            <a href="{{ route('dashboard') }}">
              <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Home
            </a>
          </li>
          @endif
          <li>
            <a href="#!" class="btn-sideBar-SubMenu">
              <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración
              <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
              <li>
                <a href="{{ route('libros.index') }}"
                  ><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Libros</a
                >
              </li>
              <li>
                <a href="{{ route('autores.index') }}"
                  ><i class="zmdi zmdi-labels zmdi-hc-fw"></i> Autores</a
                >
              </li>
              <li>
                <a href="{{ route('categorias.index') }}"
                  ><i class="zmdi zmdi-truck zmdi-hc-fw"></i> Categorias</a
                >
              </li>
              <li>
                <a href="{{ route('mis-prestamos') }}"
                  ><i class="zmdi zmdi-truck zmdi-hc-fw"></i> Mis prestamos</a
                >
              </li>
{{--               <li>
                <a href=""
                  ><i class="zmdi zmdi-book zmdi-hc-fw"></i> Mis Prestamos</a
                >
              </li> --}}
              @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
              <li>
                <a href="{{ route('prestamos.index') }}"
                  ><i class="zmdi zmdi-book zmdi-hc-fw"></i> Prestamos</a
                >
              </li>
              @endif
            </ul>
          </li>
          @if (Auth::user()->rol === 'administrador' || Auth::user()->rol === 'bibliotecario')
          <li>
            <a href="#!" class="btn-sideBar-SubMenu">
              <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios
              <i class="zmdi zmdi-caret-down pull-right"></i>
            </a>
            <ul class="list-unstyled full-box">
              <li>
                <a href="{{ route('usuarios.administradores') }}"
                  ><i class="zmdi zmdi-account zmdi-hc-fw"></i>
                  Administradores</a
                >
              </li>
              <li>
                <a href="{{ route('usuarios.lectores') }}"
                  ><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Lectores</a
                >
              </li>
              <li>
                <a href="{{ route('usuarios.bibliotecarios') }}"
                  ><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Bibliotecario</a
                >
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </section>

    <!-- Content page-->
    <section class="full-box dashboard-contentPage">
      <!-- NavBar -->
      <nav class="full-box dashboard-Navbar">
        <ul class="full-box list-unstyled text-right">
          <li class="pull-left">
            <a href="#!" class="btn-menu-dashboard"
              ><i class="zmdi zmdi-more-vert"></i
            ></a>
          </li>
        </ul>
      </nav>

    <div class="container mt-4">
      @yield('content')
    </div>

    <!--====== Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/ripples.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script>
      const loginUrl = "{{ route('login') }}";
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
      $.material.init();
    </script>
</body>
</html>