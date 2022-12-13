<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Lista de incidentes</title>
    <a href="{{ route('incident.create') }}" class="btn btn-primary">Crear</a>
</head>
<body>
    //mostrar lista de incidentes
    <h1>Lista de incidentes</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado carretera</th>
                <th scope="col">Estado trafico</th>
                <th scope="col">Foto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidents as $incident)
                <tr>
                    <th scope="row">{{ $incident->id }}</th>                    
                    <td>{{ $incident->tipo }}</td>
                    <td>{{ $incident->estado_carretera }}</td>
                    <td>{{ $incident->estado_trafico }}</td>
                    <td>{{ $incident->foto_url }}</td>
                    <td>
                        <a href="{{ route('incident.show', $incident->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('incident.edit', $incident->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('incident.destroy', $incident->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
</body>
</html>