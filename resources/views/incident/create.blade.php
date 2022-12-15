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
        {{-- crear formulario para crear un incidente --}}
        <h1>Crear Incidente</h1>
        <form action="{{ route('incident.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf           

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="nombre_usuario" value="{{ Auth::user()->nombre_usuario }}">

//imput desplegable tipo de incidentes como accidente de transito, bloqueo de pista. nevadas,huacios,etc

            <div class="form-group col-md-6">
                <label for="title">Tipo de incidente</label>
                <select name="tipo" id="title" class="form-control">
                    <option value="Accidente de transito">Accidente de transito</option>
                    <option value="Bloqueo de pista">Bloqueo de pista</option>
                    <option value="Nevadas">Nevadas</option>
                    <option value="Huaicos">Huaicos</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

//imput desplegable tipo de estado de la carretera como normal, congestionada, bloqueada,solo una via, abierto solo por tiempo limitado,etc
            <div class="form-group col-md-6">
                <label for="title">Estado carretera</label>
                <select name="estado_carretera" id="title" class="form-control">
                    <option value="Normal">Normal</option>
                    <option value="Congestionada">Congestionada</option>
                    <option value="Bloqueada">Bloqueada</option>
                    <option value="Abierto solo por tiempo limitado">Abierto solo por tiempo limitado</option>
                    <option value="Solo una via">Solo una via</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            {{--imput desplegable para seleccionar el tipo de incidente valor integer  2,4,6,8,10--}}
            //imput para estado de trafico del 1 al 10 1 es normal y 10 es muy congestionado if (estado_trafico>5) {alert("congestionado")}else{alert("normal")}
            
            <div class="form-group col-md-2">
                <label for="title">Estado trafico</label>
                <select name="estado_trafico" id="title" class="form-control">

                   
                    <option value="Libre">1</option>
                    <option value="Libre">2</option>
                    <option value="Libre">3</option>
                    <option value="Libre">4</option>
                    <option value="Normal">5</option>
                    <option value="Normal">6</option>
                    <option value="Normal">7</option>
                    <option value="Congestionado">8</option>
                    <option value="Congestionado">9</option>
                    <option value="Congestionado">10</option>
                </select>
                
                            
            </div>
            <!--imput para subir una foto y guardarla en la base de datos -->
            
            <div class="form-group col-md-6">
                <label for="title">Foto</label>
                <input type="file" name="foto_url" id="title" class="form-control">        
            </div>
        </div>
            {{-- crear boton para enviar el formulario --}}
      
      
            <div class="form-group col-md-6">
                <label for="title">Region</label>
                <select name="region" id="title" class="form-control">
                    <option value="Amazonas">Amazonas</option>
                    <option value="Ancash">Ancash</option>
                    <option value="Apurimac">Apurimac</option>
                    <option value="Arequipa">Arequipa</option>
                    <option value="Ayacucho">Ayacucho</option>
                    <option value="Cajamarca">Cajamarca</option>
                    <option value="Callao">Callao</option>
                    <option value="Cusco">Cusco</option>
                    <option value="Huancavelica">Huancavelica</option>
                    <option value="Huanuco">Huanuco</option>
                    <option value="Ica">Ica</option>
                    <option value="Junin">Junin</option>
                    <option value="La Libertad">La Libertad</option>
                    <option value="Lambayeque">Lambayeque</option>
                    <option value="Lima">Lima</option>
                    <option value="Loreto">Loreto</option>
                    <option value="Madre de Dios">Madre de Dios</option>
                    <option value="Moquegua">Moquegua</option>
                    <option value="Pasco">Pasco</option>
                    <option value="Piura">Piura</option>
                    <option value="Puno">Puno</option>
                    <option value="San Martin">San Martin</option>
                    <option value="Tacna">Tacna</option>
                    <option value="Tumbes">Tumbes</option>
                    <option value="Ucayali">Ucayali</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="title">Provincia</label>
                <input type="text" name="provincia" id="title" class="form-control">
            </div>
            
            <div class="form-group col-md-6">
                <label for="title">Ciudad</label>
                <input type="text" name="ciudad" id="title" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="title">Referencia</label>
                <input type="text" name="referencia" id="title" class="form-control">
            
        

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Crear</button>
           
            </div>


        </form>
       


    
</body>
</html>