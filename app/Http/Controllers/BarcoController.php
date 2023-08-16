<?php

namespace App\Http\Controllers;

use App\Models\Barco;
use App\Models\Cliente;
use Illuminate\Http\Request;
use DB;

class BarcoController extends Controller
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
        $data['content_1'] = Barco::get();

        return view('barco.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$data['barco'] = Barco::get();


        /*$data['value_form'] = [
            'id' => '-1',
            'nombre' => '',
            'fecha_inicio' => '',
            'fecha_fin' => '',
            'turno_inicio' => '',
            'turno_fin' => '',
            'lugar_carga' => '',
            'tipo_barco' => '',
            'toneladas_fmo' => '',
            'toneladas_cliente' => '',



		];*/
    return view('barco.create');


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
            'nombre'=> 'required',
            'fecha_inicio'=> 'required',
            'fecha_fin'=> 'required',
            'turno_inicio'=> 'required|integer',
            'turno_fin'=> 'required|integer',
            'lugar_carga' =>'required|string',
            'tipo_barco' =>'required|string',
            'toneladas_fmo'=> 'required|integer',
            'toneladas_cliente'=> 'required|integer',
        ]);

         Barco::create([
            'nombre'=>$request->nombre,
            'fecha_inicio'=>$request->fecha_inicio,
            'fecha_fin'=>$request->fecha_fin,
            'turno_inicio'=>$request->turno_inicio,
            'turno_fin'=>$request->turno_fin,
            'lugar_carga'=>$request->lugar_carga,
            'tipo_barco'=>$request->tipo_barco,
            'toneladas_fmo'=>$request->toneladas_fmo,
            'toneladas_cliente'=>$request->toneladas_cliente,

         ]);

        return redirect()->route('barco.index')->with('EXITO', 'Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barco  $barco
     * @return \Illuminate\Http\Response
     */
    public function show(Barco $barco)
    {
        //
    }

    public function consultaFechasBarco(Request $request, $fecha_inicio, $fecha_fin){


            $barco= DB::table('barco')

            ->selectRaw ('SUM(toneladas_fmo) AS tonfmo, SUM(toneladas_cliente) AS toncliente')

           ->whereBetween('fecha_inicio', [$fecha_inicio, $fecha_fin])

            ->get();

            return $barco;






      }
    public function edit($id)
    {
        $barco = Barco::findOrFail($id);


        $data['value_form'] = [

            'id' => $id,
            'nombre' => $barco->nombre,
            'fecha_inicio'=>$barco->fecha_inicio,
            'fecha_fin'=>$barco->fecha_fin,
            'turno_inicio'=>$barco->turno_inicio,
            'turno_fin'=>$barco->turno_fin,
            'lugar_carga'=>$barco->lugar_carga,
            'tipo_barco'=>$barco->tipo_barco,
            'toneladas_fmo'=>$barco->toneladas_fmo,
            'toneladas_cliente'=>$barco->toneladas_cliente,


        ];


        return view ('barco.edit',compact('barco'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barco  $barco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datos=Request()-> except(['_token', '_method']);

        Barco::where('id', '=', $id)->update($datos);

        return redirect('barco')
            ->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barco  $barco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3){
            $barco=Barco::findOrFail($id);
            $barco->delete();

           return redirect()->route('barco.index')
               ->with('EXITO', 'Eliminación satisfactoria');
        }
        else{
            return redirect()->route('barco.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
