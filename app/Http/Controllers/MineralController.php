<?php

namespace App\Http\Controllers;

use App\Models\Mineral;
use Illuminate\Http\Request;

class MineralController extends Controller
{
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1,3')->only(['create']);
       $this->middleware('roles:1,3')->only(['edit']);
       $this->middleware('roles:1,3')->only(['form']);



    }
    public function index()
    {
        $mineral = Mineral::get();

        return view('mineral.index', compact('mineral'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mineral.create');
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


            'nombre'=> 'required|string',
            'tipo_mineral'=> 'required|string',


        ];

            $Mensaje=["required"=> 'El :attribute es requerido'];
            $this->validate($request,$campos,$Mensaje);

            Mineral::create($request->all());

        return redirect()->route('mineral.index')->with('EXITO', 'Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mineral  $mineral
     * @return \Illuminate\Http\Response
     */
    public function show(Mineral $mineral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mineral  $mineral
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mineral = Mineral::findOrFail($id);
        return view ('mineral.edit',compact('mineral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mineral  $mineral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        Mineral::where('id', '=', $id)->update($datos);

        return redirect('mineral')
            ->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mineral  $mineral
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3){
            $mineral= Mineral::findOrFail($id);
            $mineral->delete();

            return redirect()->route('mineral.index')
            ->with('EXITO', 'Eliminación satisfactoria');
        }
        else {
            return redirect()->route('mineral.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }
    }
}
