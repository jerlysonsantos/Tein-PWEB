<?php

namespace App\Http\Controllers;

use App\Vehicles;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicles::orderBY('created_at', 'desc')->paginate(10);
        return $vehicles;
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
        $vehicles = new Vehicles;
        $vehicles->mark = $request->mark;
        $vehicles->model = $request->model;
        $vehicles->licensePlate = $request->licensePlate;
        $vehicles->carOwnName = $request->carOwnName;
        $vehicles->save();
        return response('Registrado com Sucesso!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicles $vehicles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicles $vehicles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicles = Vehicles::findOrFail($id);
        $vehicles->mark = $request->mark;
        $vehicles->model = $request->model;
        $vehicles->licensePlate = $request->licensePlate;
        $vehicles->carOwnName = $request->carOwnName;
        $vehicles->save();
        return response('Atualizado com Sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicles = Vehicles::findOrFail($id);
        $vehicles->delete($id);
        return response('Veiculo Apagado!', 200);
    }
}
