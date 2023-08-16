<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\User;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1')->only(['create']);
       $this->middleware('roles:1')->only(['edit']);



    }
    public function index()
    {
        $datos['actividades']=Actividad::get();
        $datos2['users']=User::all();
        return view('actividades.index',$datos, $datos2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividades.create');
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
            'fecha' => 'required',
            'asunto' => 'required',
            'actividad' => 'required',
            'und_respon' => 'required'
        ];

        $Mensaje=["required"=> 'El :attribute es requerido'];
            $this->validate($request,$campos,$Mensaje);

        $datos=Request()->except('_token');

        Actividad::insert($datos);

        return redirect('actividades')->with('Enhorabuena', 'Actividad creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividades)
    {
        return view('actividades.show', compact('actividades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividades= Actividad::findOrFail($id);
        return view('actividades.edit', compact('actividades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$actividades->update($request->all());

        $datos=Request()-> except(['_token', '_method']);

        Actividad::where('id', '=', $id)->update($datos);
        return redirect('actividades')
            ->with('Actividad actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividades  $actividades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1){
            $actividades=Actividad::findOrFail($id);

            $actividades->delete();

            return redirect('actividades')->with('Actividad eliminada satisfactoriamente');
        }
        else{
            return redirect()->route('actividades.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
