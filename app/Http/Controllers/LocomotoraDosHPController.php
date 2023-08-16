<?php

namespace App\Http\Controllers;

use App\Models\LocomotoraDosHP;
use Illuminate\Http\Request;
use App\Models\Tren;

class LocomotoraDosHPController extends Controller
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
       $this->middleware('roles:1')->only(['form']);


    }
    public function index()
    {
        $data['content_1'] = LocomotoraDosHP::get();

        return view('locomotoradoshp.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['locomotora2hp'] = LocomotoraDosHP::get();


        $data['value_form'] = [
            'id' => '-1',
            'fecha' => '',
            'cant_disponible' => '',



		];


        return view('locomotoradoshp.create', $data);
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

            'fecha' => 'required',

            'cant_disponible'=> 'required|integer',

        ]);

         LocomotoraDosHP::create([

            'fecha'=>$request->fecha,

            'cant_disponible'=>$request->cant_disponible,



         ]);


         return redirect('locomotoradoshp')->with('EXITO', 'Creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocomotoraDosHP  $locomotoraDosHP
     * @return \Illuminate\Http\Response
     */
    public function show(LocomotoraDosHP $locomotoraDosHP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocomotoraDosHP  $locomotoraDosHP
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locomotoradoshp = LocomotoraDosHP::findOrFail($id);


        $data['value_form'] = [

            'id' => $id,
            'fecha'=>$locomotoradoshp->fecha,
            'cant_disponible'=>$locomotoradoshp->cant_disponible,

        ];


        return view ('locomotoradoshp.edit',compact('locomotoradoshp'),$data);//puede haber error
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocomotoraDosHP  $locomotoraDosHP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        LocomotoraDosHP::where('id', '=', $id)->update($datos);


        return redirect('locomotoradoshp')->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocomotoraDosHP  $locomotoraDosHP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $user= auth()->user()->rol_id;

        if($user==1){
            $locomotora2hp=LocomotoraDosHP::findOrFail($id);

            $locomotora2hp->delete();

            return redirect('locomotoradoshp')->with('EXITO', 'Eliminación satisfactoria');
        }
        else{
            return redirect()->route('locomotoradoshp.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
