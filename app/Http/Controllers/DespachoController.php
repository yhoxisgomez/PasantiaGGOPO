<?php

namespace App\Http\Controllers;

use App\Models\Despacho;
use App\Models\Cliente;
use App\Models\Mineral;
use Illuminate\Http\Request;
use DB;


class DespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1,3')->only(['create']);
       $this->middleware('roles:1,3')->only(['edit']);
       $this->middleware('roles:1,3')->only(['form']);


    }
    public function index()
    {
        $data['content_1'] = Despacho::get();

        return view('despachos.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['clientes'] = Cliente::get();
        $data['mineral'] = Mineral::get();


        $data['value_form'] = [
            'id' => '-1',
            'fecha' => '',
            'turno' => '',
            'lugar' => '',
            'vagones' => '',
            'toneladas' => '',
            'cliente_id' => '',
            'mineral_id' => '',


		];
         return view('despachos.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id'=> 'required|exists:clientes,id',
            'mineral_id'=> 'required|exists:mineral,id',
            'fecha'=> 'required',
            'turno'=> 'required|integer',
            'lugar'=> 'required|string',
            'vagones'=> 'required|integer',
            'toneladas'=> 'required|integer',
        ]);

         Despacho::create([
            'cliente_id'=>$request->cliente_id,
            'mineral_id'=>$request->mineral_id,
            'fecha'=>$request->fecha,
            'turno'=>$request->turno,
            'lugar'=>$request->lugar,
            'vagones'=>$request->vagones,
            'toneladas'=>$request->toneladas,

         ]);

        return redirect()->route('despachos.index')->with('EXITO', 'Creado satisfactoriamente.');
    }

    public function consultaFechasDespacho(Request $request, $fecha_inicio, $fecha_fin){


        $despachos= DB::table('despachos')

        ->selectRaw ('SUM(vagones) AS totalvag, SUM(toneladas) AS ton')

       ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])

        ->get();

        return $despachos;



     }

    public function edit($id)
    {
        $despachos = Despacho::findOrFail($id);
        $data['clientes'] = Cliente::get();
        $data['mineral'] = Mineral::get();

        $data['value_form'] = [

            'id' => $id,
            'fecha'=>$despachos->fecha,
            'turno'=>$despachos->turno,
            'lugar'=>$despachos->lugar,
            'vagones'=>$despachos->vagones,
            'toneladas'=>$despachos->toneladas,

            'cliente_id' => $despachos->cliente_id,
            'mineral_id' => $despachos->mineral_id,
        ];


        return view ('despachos.edit',compact('despachos'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despacho  $despacho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $datos=Request()-> except(['_token', '_method']);

        Despacho::where('id', '=', $id)->update($datos);

        return redirect('despachos')
            ->with('EXITO', 'Actualización exitosa');
    }

    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3){
            $despachos=Despacho::findOrFail($id);
            $despachos->delete();

           return redirect()->route('despachos.index')
               ->with('EXITO', 'Eliminación satisfactoria');
        }
        else{
            return redirect()->route('despachos.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }


    }
}
