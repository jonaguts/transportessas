<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductors = Conductor::all();
        return $conductors;
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conductors = new Conductor();
        $conductors->conductors_nombre = $request->nombre;
        $conductors->conductors_apellido = $request->apellido;
        $conductors->conductors_identificacion = $request->identificacion;
        $conductors->conductors_direccion = $request->direccion;
        $conductors->conductors_telefono = $request->telefono;
        $conductors->ciudads_id = $request->ciudad;
        $conductors->pais_id = $request->pais;
        $conductors->supervisors_id = $request->supervisor;

        $conductors->save();
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
    public function update(Request $request)
    {
        $conductors = Conductor::findOrFail($request->id);
        $conductors->conductors_nombre = $request->nombre;
        $conductors->conductors_apellido = $request->apellido;
        $conductors->conductors_identificacion = $request->identificacion;
        $conductors->conductors_direccion = $request->direccion;
        $conductors->conductors_telefono = $request->telefono;
        $conductors->ciudads_id = $request->ciudad;
        $conductors->pais_id = $request->pais;
        $conductors->supervisors_id = $request->supervisor;

        $conductors->save();

        return $conductors;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conductors = Conductor::destroy($request->id);
        return $conductors;
    }
}
