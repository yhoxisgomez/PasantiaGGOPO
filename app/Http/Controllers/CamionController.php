<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use App\Models\Cliente;
use Illuminate\Http\Request;
use DB;

class CamionController extends Controller
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
        $data['content_1'] = Camion::get();

        return view('camion.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['clientes'] = Cliente::get();


        $data['value_form'] = [
            'id' => '-1',
            'fecha' => '',
            'turno' => '',
            'viajes' => '',
            'toneladas' => '',
			'cliente_id' => '',


		];
    return view('camion.create',$data);

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
            'fecha'=> 'required',
            'turno'=> 'required|integer',
            'viajes'=> 'required|integer',
            'toneladas'=> 'required|integer',
        ]);

         Camion::create([
            'cliente_id'=>$request->cliente_id,
            'fecha'=>$request->fecha,
            'turno'=>$request->turno,
            'viajes'=>$request->viajes,
            'toneladas'=>$request->toneladas,

         ]);

        return redirect()->route('camion.index')->with('EXITO', 'Creado satisfactoriamente.');
    }
    public function consultaFechasCamion(Request $request, $fecha_inicio, $fecha_fin){


        $camion= DB::table('camion')

        ->selectRaw ('SUM(viajes) AS totalviajes, SUM(toneladas) AS ton')

       ->whereBetween('fecha', [$fecha_inicio, $fecha_fin])

        ->get();

        return $camion;



     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function show(Camion $camion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camion = Camion::findOrFail($id);
        $data['clientes'] = Cliente::get();

        $data['value_form'] = [

            'id' => $id,
            'fecha'=>$camion->fecha,
            'turno'=>$camion->turno,
            'viajes'=>$camion->lugar,
            'toneladas'=>$camion->toneladas,

            'cliente_id' => $camion->cliente_id,
        ];


        return view ('camion.edit',compact('camion'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        Camion::where('id', '=', $id)->update($datos);

        return redirect('camion')
            ->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camion  $camion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3){
            $camion=Camion::findOrFail($id);
            $camion->delete();

           return redirect()->route('camion.index')
               ->with('EXITO', 'Eliminación satisfactoria');
        }
        else{
            return redirect()->route('camion.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
