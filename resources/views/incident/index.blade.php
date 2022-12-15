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
                <th scope="col">Usuario</th>
                <th scope="col">Tipo</th>
                <th scope="col">Estado carretera</th>
                <th scope="col">Estado trafico</th>
                <th scope="col">Foto</th>

                <th scope="col">Region</th>
                <th scope="col">Provincia</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Referencia</th>


                <th scope="col">Acciones</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($incidents as $incident)
           
            <tr></tr>
                <td>{{ $incident->user->id }}</td>
                <td>{{ $incident->user->name }}</td>
                <td>{{ $incident->tipo }}</td>
                <td>{{ $incident->estado_carretera }}</td>
                <td>{{ $incident->estado_trafico }}</td>              
                <td><img src="{{ $incident->foto_url }}" alt="" width="100"></td>



                <td>{{ $incident->location->region }}</td>
                <td>{{ $incident->location->provincia }}</td>
                <td>{{ $incident->location->ciudad }}</td>
                <td>{{ $incident->location->referencia }}</td>
                
               
                <td>
                    <a href="{{ route('incident.show', $incident->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('incident.edit', $incident->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('incident.destroy', $incident->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
                
            @endforeach
        </tbody>
</body>
</html>