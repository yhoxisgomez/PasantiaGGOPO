<?php

namespace App\Http\Controllers;

use App\Models\FlotaActual;
use Illuminate\Http\Request;

use DateTime;

class FlotaActualController extends Controller
{
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1,3,4')->only(['create']);
       $this->middleware('roles:1,3,4')->only(['edit']);
       $this->middleware('roles:1,3,4')->only(['form']);
      // $this->middleware('roles:1')->only($id);


    }
    public function index()
    {
        $FlotaActual = FlotaActual::get();

        return view('FlotaActual.index', compact('FlotaActual'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        //return $fecha;
        return view('FlotaActual.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[


            'flotaLocomotora4HP_actual'=>'required|integer',
            'flotaLocomotora2HP_actual'=>'required|integer',
            'flotaVagonesTolva_actual'=>'required|integer',
            'flotaVagonesGondola_actual'=>'required|integer',

        ];

            $Mensaje=["required"=> 'El :attribute es requerido'];
            $this->validate($request,$campos,$Mensaje);

            FlotaActual::create($request->all());

        return redirect()->route('FlotaActual.index')->with('EXITO', 'Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlotaActual  $flotaActual
     * @return \Illuminate\Http\Response
     */
    public function show(FlotaActual $flotaActual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlotaActual  $flotaActual
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $FlotaActual = FlotaActual::findOrFail($id);
        return view ('FlotaActual.edit',compact('FlotaActual'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlotaActual  $flotaActual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        FlotaActual::where('id', '=', $id)->update($datos);

        $fecha = date('Y-m-d:g:i:a');


        //return $fecha;

        return redirect('FlotaActual');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlotaActual  $flotaActual
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3 || $user==4){
            $FlotaActual=FlotaActual::findOrFail($id);
            $FlotaActual->delete();

            return redirect()->route('FlotaActual.index')
            ->with('EXITO', 'Eliminación satisfactoria');
        }
        else if ($user==2){
            return redirect()->route('FlotaActual.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }
    }
}
