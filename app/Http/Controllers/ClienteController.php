<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

            $clientes=Cliente::all();
            return view ('cliente.index')->with('clientes',$clientes);

    }
    public function create(){
         return view('cliente.create');
    }

    public function store (Request $request){
        $clientes= new Cliente();;
        $clientes->nombre=$request->get('nombre');
        $clientes->apellido=$request->get('apellido');
        $clientes->direccion=$request->get('direccion');
        $clientes->cedula=$request->get('cedula');
        $clientes->correo=$request->get('correo');
        $clientes->telefono=$request->get('telefono');
        $clientes->save();
        return redirect('/cliente');
    }
    public function show($id_cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        return view('cliente.edit')->with('cliente',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        $cliente->nombre=$request->get('nombre');
        $cliente->apellido=$request->get('apellido');
        $cliente->direccion=$request->get('direccion');
        $cliente->cedula=$request->get('cedula');
        $cliente->correo=$request->get('correo');
        $cliente->telefono=$request->get('telefono');
        $cliente->save();
        return redirect('/cliente');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        $cliente = Cliente::find($id_cliente);
        $cliente->delete();
        return redirect('/cliente');
    }

}
