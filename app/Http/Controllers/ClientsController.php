<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::orderBY('created_at', 'desc')->paginate(10);
        return $clients;
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
        $clients = new Clients;
        $clients->name = $request->name;
        $clients->gender = $request->gender;
        $clients->age = $request->age;
        $clients->email = $request->email;
        $clients->phone = $request->phone;
        $clients->organization = $request->organization;
        $clients->save();
        return redirect()->route('clients/index')->with('message', 'Cliente cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clients = Clients::findOrFail($id);
        $clients->name = $request->name;
        $clients->gender = $request->gender;
        $clients->age = $request->age;
        $clients->email = $request->email;
        $clients->phone = $request->phone;
        $clients->organization = $request->organization;
        $clients->save();
        return redirect()->route('clients.index')->with('message', 'Cliente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Clients::findOrFail($id);
        $clients->delete($id);
        return redirect()->route('clients.index')->with('message','Cliente Apagado');
    }
}
