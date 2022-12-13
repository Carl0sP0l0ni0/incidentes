<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar todos los incidentes

        $incidents = Incident::all();
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
        $name =auth()->user()->name;
        //dd($user_id, $user_name );

       
        if($request->hasFile('featured')){
            $file = $request->file('featured');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
                       
        }

       
        $incident = new Incident();
        $incident->user_id = $user_id;
        $incident->tipo = $request->tipo;
        $incident->estado_carretera = $request->estado_carretera;
        $incident->estado_trafico = $request->estado_trafico;
        $incident->foto_url = $name;
        $incident->save();

        $request->validate([
            'tipo' => 'required',
            'estado_carretera' => 'required',
            'estado_trafico' => 'required',
            'foto_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      
        
        
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
