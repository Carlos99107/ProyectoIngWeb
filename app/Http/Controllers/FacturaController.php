<?php

namespace App\Http\Controllers;
use App\Models\Orden;
use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Plato;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FacturaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){

            $facturas=Factura::join('orden','orden.id_orden','factura.id_orden')
            ->join('cliente','cliente.id_cliente','orden.id_cliente')
            ->join('users','users.id','orden.id_user')
            ->join('plato','plato.id_plato','orden.id_plato')
            ->select(['factura.*','orden.numero_orden','orden.cantidad','orden.estado', 'cliente.nombre as NameCliente'
            , 'cliente.cedula', 'cliente.telefono', 'cliente.apellido', 'cliente.correo', 'cliente.direccion', 'users.name as NameUser'
            ,'plato.nombre as PlatoName', 'plato.precio'])
            ->get();
            return view ('factura.index')->with('facturas',$facturas);

    }
    public function create(){
        $orden=Orden::all();
        $user=User::all();
        $plato=Plato::all();
        $cliente=Cliente::all();
         return view('factura.create')->with('orden',$orden)->with('user',$user)->with('cliente',$cliente)->with('plato',$plato);
    }

    public function store (Request $request){

        $orden= Orden::find($request->get('id_orden'));
        $plato= Plato::find($orden-> id_plato);
        $subtotal=$plato ->precio * $orden->cantidad;
        $iva=$subtotal*0.12;
        $facturas= new Factura();
        $facturas->id_orden=$request->get('id_orden');
        $facturas->subtotal=$subtotal;
        $facturas->iva=$iva;
        $facturas->total=$iva+$subtotal;
        $facturas->save();
        return redirect('/factura');
    }
    public function show($id_factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_factura, $id_orden)
    {
        $factura = Factura::find($id_factura);
        $orden= Orden::find($id_orden);
        $orden=Orden::all();
        $user=User::all();
        $plato=Plato::all();
        $cliente=Cliente::all();
        return view('factura.edit')->with('factura',$factura)->with('orden',$orden)->with('user',$user)->with('cliente',$cliente)->with('plato',$plato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_factura, $id_orden)
    {
        $factura = Factura::find($id_factura);
        $factura->id_orden=$request->get('id_orden');
        $factura->save();
        return redirect('/factura');
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_factura)
    {
        $factura = Factura::find($id_factura);
        $factura->delete();
        return redirect('/factura');
    }

    public function ventas(Request $request){
        $total1=0;
        $total2=0;
        $fecha='';
        $fecha1='';
        $fecha2='';
        $fecha3='';
        return view('factura.ventas')->with('total1', $total1)->with('total2', $total2)->with('fecha', $fecha)->with('fecha1', $fecha1)
        ->with('fecha2', $fecha2)->with('fecha3', $fecha3);
    }
    public function filterdate(Request $request){
        $total1= Factura::where('fecha', '>=', $request->fechaInicial)->where('fecha','<=',$request->fechaFinal.' 23:59:59')->sum('total');
        $total2= Factura::where('fecha', '>=', $request->fechaInicial1)->where('fecha','<=',$request->fechaFinal2.' 23:59:59')->sum('total');
        $fecha=$request->fechaInicial;
        $fecha1=$request->fechaFinal;
        $fecha2= $request->fechaInicial1;
        $fecha3=$request->fechaFinal2;
        return view('factura.ventas')->with('total1', $total1)->with('total2', $total2)->with('fecha', $fecha)->with('fecha1', $fecha1)
        ->with('fecha2', $fecha2)->with('fecha3', $fecha3);
    }

}
