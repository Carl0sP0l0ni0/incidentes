<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
        // Formulario para crear un incidente
        <h1>Crear Incidente</h1>
        <form action="{{ route('incident.store') }}" method="POST">
            @csrf
          
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <div class="form-group col-md-6 ">
                <label for="title">Tipo Incidente</label>
                <input type="text" name="tipo" id="title" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="title">Estado carretera</label>
                <input type="text" name="estado_carretera" id="title" class="form-control">
            </div>

            //imput desplegable para seleccionar el tipo de incidente valor integer  2,4,6,8,10
            <div class="form-group col-md-6">
                <label for="title">Tipo de incidente</label>
                <select name="estado_trafico" id="title" class="form-control">
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>
                    <option value="10">10</option>
                </select>
            </div>

            //imput para subir una foto y guardarla en la base de datos
            <div class="form-group col-md-6">
                <label for="title">Foto</label>
                <input type="file" name="foto_url" id="title" class="form-control">
           
         
            //crear boton para enviar el formulario
            <button type="submit" class="btn btn-primary">Crear</button>


         
            
        </form>

    
</body>
</html>