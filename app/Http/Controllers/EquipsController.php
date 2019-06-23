<?php

namespace App\Http\Controllers;

use App\Equips;
use Illuminate\Http\Request;

class EquipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equips = Equips::orderBY('created_at', 'desc')->paginate(10);
        return $equips;
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
        $equips = new Equips;
        $equips->name = $request->name;
        $equips->type = $request->type;
        $equips->location = $request->location;
        $equips->save();
        return response('Registrado com Sucesso!', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equips  $equips
     * @return \Illuminate\Http\Response
     */
    public function show(Equips $equips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equips  $equips
     * @return \Illuminate\Http\Response
     */
    public function edit(Equips $equips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equips  $equips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equips = Equips::findOrFail($id);
        $equips->name = $request->name;
        $equips->type = $request->type;
        $equips->location = $request->location;
        $equips->save();
        return response('Atualizado com Sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equips  $equips
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equips = Equips::findOrFail($id);
        $equips->delete($id);
        return response('Equipamento Apagado!', 200);
    }
}
