@extends('layouts.app')

@section('title', 'Lista de Libros')

@section('content')
  <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">Estadisticas <small></small></h1>
        </div>
      </div>
      <div class="full-box text-center" style="padding: 30px 10px">
        <article class="full-box tile">
          <div
            class="full-box tile-title text-center text-titles text-uppercase"
          >
            Usuarios totales
          </div>
          <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-account"></i>
          </div>
          <div class="full-box tile-number text-titles">
            <p class="full-box">{{ $totalUsuarios }}</p>
            <small>usuarios</small>
          </div>
        </article>
        <article class="full-box tile">
          <div
            class="full-box tile-title text-center text-titles text-uppercase"
          >
            Total de libros
          </div>
          <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-male-alt"></i>
          </div>
          <div class="full-box tile-number text-titles">
            <p class="full-box">{{ $totalLibros }}</p>
            <small>libros</small>
          </div>
        </article>
        <article class="full-box tile">
          <div
            class="full-box tile-title text-center text-titles text-uppercase"
          >
            Total de autores
          </div>
          <div class="full-box tile-icon text-center">
            <i class="zmdi zmdi-face"></i>
          </div>
          <div class="full-box tile-number text-titles">
            <p class="full-box">{{ $totalAutores }}</p>
            <small>autores</small>
          </div>
        </article>
      </div>
      <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">Libros más populares</h1>
        </div>
        <section id="cd-timeline" class="cd-container">
          <canvas id="librosMasPopularesChart"></canvas>

      <script>
        const labelsPopulares = @json($labelsPopulares);
        const dataPopulares = {
            labels: labelsPopulares,
            datasets: [{
                label: 'Cantidad de Préstamos',
                data: @json($dataPopulares),
                backgroundColor: 'rgba(54, 162, 235, 0.8)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        const configPopulares = {
            type: 'bar',
            data: dataPopulares,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            },
        };

        const librosMasPopularesChart = new Chart(
            document.getElementById('librosMasPopularesChart'),
            configPopulares
        );
    </script>
      </div>
      <div class="container-fluid">
        <div class="page-header">
          <h1 class="text-titles">Categorias por libro</h1>
        </div>
        <section id="cd-timeline" class="cd-container">
          <canvas id="librosMasPopularesChart"></canvas>

      <script>
        const labels = @json($labelsCategorias);
        const data = {
            labels: labels,
            datasets: [{
                label: 'Cantidad de Libros',
                data: @json($dataCategorias),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(153, 102, 255, 0.8)',
                    'rgba(255, 159, 64, 0.8)'
                    // ... más colores si tienes más categorías
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0 // Para mostrar números enteros en el eje Y
                    }
                }
            },
        };

        const librosPorCategoriaChart = new Chart(
            document.getElementById('librosPorCategoriaChart'),
            config
        );
    </script>
      </div>
@endsection