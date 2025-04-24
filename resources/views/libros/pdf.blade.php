<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Libros</title>
</head>
<body>
  <div class="container-fluid">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Lista de libros</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Título</th>
								<th class="text-center">ISBN</th>
								<th class="text-center">Categoria</th>
								<th class="text-center">Fecha de publicación</th>
								<th class="text-center">Editorial</th>
								<th class="text-center">Portada</th>
								<th class="text-center">Autor</th>
							</tr>
						</thead>
						<tbody>
              @foreach ($libros as $libro)
							<tr>
								<td>{{ $libro->libro_id }}</td>
								<td>{{ $libro->titulo }}</td>
								<td>{{ $libro->ISBN }}</td>
								<td>{{ $libro->categoria->nombre }}</td>
								<td>{{ $libro->fecha_publicacion }}</td>
								<td>{{ $libro->editorial }}</td>
								<td>
                  <img src="{{ asset('storage/' . $libro->imagen_portada) }}" alt="Portada de {{ $libro->titulo }} " style="max-width: 100px; max-height: 150px;">
                </td>
                <td>
                  @foreach ($libro->autores as $autor)
                    {{ $autor->nombre }}<br>
                  @endforeach
                </td>
                <td>Prueba</td>
							</tr>
              @endforeach
						</tbody>
					</table>
				</div>
</body>
</html>