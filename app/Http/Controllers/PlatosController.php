<?php

namespace App\Http\Controllers;
use App\Models\Plato;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlatosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

            $platos=Plato::all();
            return view ('plato.index')->with('platos',$platos);

    }
    public function create(){
         return view('plato.create');
    }

    public function store (Request $request){
        $platos= new Plato();;
        $platos->nombre=$request->get('nombre');
        $platos->descripcion=$request->get('descripcion');
        $platos->precio=$request->get('precio');
        $platos->save();
        return redirect('/plato');
    }
    public function show($id_plato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_plato)
    {
        $plato = Plato::find($id_plato);
        return view('plato.edit')->with('plato',$plato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_plato)
    {
        $plato = Plato::find($id_plato);
        $plato->nombre=$request->get('nombre');
        $plato->descripcion=$request->get('descripcion');
        $plato->precio=$request->get('precio');
        $plato->save();
        return redirect('/plato');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_plato)
    {
        $plato = Plato::find($id_plato);
        $plato->delete();
        return redirect('/plato');
    }
}
