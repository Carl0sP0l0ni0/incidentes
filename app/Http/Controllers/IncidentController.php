<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;
use App\Models\Location;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar todos los incidentes optimizado

        $incidents = Incident::with('user')->get(); 
        $locations= Incident::with('location')->get();


       
        return view('incident.index', compact('incidents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //crear un incidente -redirecionar a una vista
        return view('incident.create');
    


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //almacenar un incidente



        $user_id =auth()->user()->id;
        $user_name =auth()->user()->name;
        //dd($user_id );

        if($request->hasFile('foto_url')){
            $file = $request->file('foto_url');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/fotos/', $name);

        }
        $path = '/fotos/'.$name;
        
       
        $incident = new Incident();
        $incident->user_id = $user_id;
        $incident->nombre_usuario = $user_name;        
        $incident->tipo = $request->tipo;
        $incident->estado_carretera = $request->estado_carretera;
        $incident->estado_trafico = $request->estado_trafico;
        $incident->foto_url = $path;    
       
        $incident->save();  
        
        $id_incidents=$incident->id;

        // crear una location con el id del incidente creado
       
        $location= new Location();
        $location->incident_id = $id_incidents;
        $location->region = $request->region;
        $location->provincia = $request->provincia;
        $location->ciudad = $request->ciudad;
        $location->referencia = $request->referencia;
        $location->save();
        
     


        
       


        
        return redirect()->route('incident.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
