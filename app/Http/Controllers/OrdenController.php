<?php

namespace App\Http\Controllers;
use App\Models\Orden;
use App\Models\User;
use App\Models\Plato;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrdenController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

            $ordenes=Orden::join('users','users.id','orden.id_user')
            ->join('plato','plato.id_plato','orden.id_plato')
            ->join('cliente','cliente.id_cliente','orden.id_cliente')
            ->select(['orden.*','users.name as NameUser','plato.nombre as NamePlato','cliente.nombre as NameCliente', 'plato.precio', 'cliente.apellido'])
            ->get();
            return view ('orden.index')->with('ordenes',$ordenes);

    }
    public function create(){
            $user=User::all();
            $plato=Plato::all();
            $cliente=Cliente::all();
         return view('orden.create')->with('user',$user)->with('plato',$plato)->with('cliente',$cliente);
    }

    public function store (Request $request){
        $ordenes= new Orden();
        $ordenes->id_user=$request->get('id_user');
        $ordenes->id_plato=$request->get('id_plato');
        $ordenes->id_cliente=$request->get('id_cliente');
        $ordenes->numero_orden=$request->get('numero_orden');
        $ordenes->cantidad=$request->get('cantidad');
        $ordenes->tipo_pago=$request->get('tipo_pago');
        $ordenes->estado=$request->get('estado');
        $ordenes->save();
        return redirect('/orden');
    }
    public function show($id_orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_orden)
    {
        $orden = Orden::find($id_orden);
        $user=User::all();
        $plato=Plato::all();
        $cliente=Cliente::all();
        return view('orden.edit')->with('orden',$orden)->with('plato',$plato)->with('cliente',$cliente)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_orden)
    {
        $orden = Orden::find($id_orden);
        $orden->id_user=$request->get('id_user');
        $orden->id_plato=$request->get('id_plato');
        $orden->id_cliente=$request->get('id_cliente');
        $orden->numero_orden=$request->get('numero_orden');
        $orden->cantidad=$request->get('cantidad');
        $orden->tipo_pago=$request->get('tipo_pago');
        $orden->estado=$request->get('estado');
        $orden->fecha=$request->get('fecha');
        $orden->save();
        return redirect('/orden');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_orden)
    {
        $orden = Orden::find($id_orden);
        $orden->delete();
        return redirect('/orden');
    }
    public function mejores(){
        $nombreplato='';
        $mayor=0;
        return view('orden.mejores')->with('nombreplato', $nombreplato)->with('mayor', $mayor);
    }
    public function filterplate(Request $request){

        //return response()->json($request);
        $mayor=0;
        $nombreplato=Orden::where('fecha', '>=', $request->fechaInicial)->where('fecha','<=',$request->fechaFinal.' 23:59:59')
        ->join('plato','plato.id_plato','=','orden.id_plato')->groupBy('plato.nombre')
        ->select('plato.nombre',DB::raw('SUM(cantidad) as total_cantidad'))
        ->orderBy(DB::raw('SUM(cantidad)'),'DESC')
        ->first();
        //return response()->json($nombreplato);
        return view('orden.mejores')->with('nombreplato', $nombreplato);
    }
    public function mejoresClientes(){
        $nombrecliente=null;
        return view('orden.mejoresClientes')->with('nombrecliente', $nombrecliente);
    }
    public function filterclient(Request $request){

        //return response()->json($request);
        $nombrecliente=Orden::where('fecha', '>=', $request->fechaInicial)->where('fecha','<=',$request->fechaFinal.' 23:59:59')
        ->join('cliente','cliente.id_cliente','=','orden.id_cliente')->groupBy('cliente.nombre')
        ->select('cliente.nombre',DB::raw('count(*) as user_count,nombre'))
        ->orderBy(DB::raw('user_count'),'DESC')
        ->limit(3)->get();
        //return response()->json($nombrecliente);
        return view('orden.mejoresClientes')->with('nombrecliente', $nombrecliente);
    }

}
