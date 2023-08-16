<?php

namespace App\Http\Controllers;

use App\Models\LocomotoraCuatroHP;
use Illuminate\Http\Request;
use App\Models\Tren;

class LocomotoraCuatroHPController extends Controller
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
        $data['content_1'] = LocomotoraCuatroHP::get();

        return view('locomotoracuatrohp.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['locomotora4hp'] = LocomotoraCuatroHP::get();


        $data['value_form'] = [
            'id' => '-1',
            'fecha' => '',
            'cant_disponible_pto' => '',
            'cant_disponible_mina' => '',




		];


        return view('locomotoracuatrohp.create', $data);
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

            'cant_disponible_pto'=> 'required|integer',
            'cant_disponible_mina'=> 'required|integer',

        ]);

         LocomotoraCuatroHP::create([

            'fecha'=>$request->fecha,
            'cant_disponible_pto'=>$request->cant_disponible_pto,
            'cant_disponible_mina'=>$request->cant_disponible_mina,



         ]);


         return redirect('locomotoracuatrohp')->with('EXITO', 'Creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LocomotoraCuatroHP  $locomotoraCuatroHP
     * @return \Illuminate\Http\Response
     */
    public function show(LocomotoraCuatroHP $locomotoraCuatroHP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LocomotoraCuatroHP  $locomotoraCuatroHP
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locomotoracuatrohp = LocomotoraCuatroHP::findOrFail($id);


        $data['value_form'] = [

            'id' => $id,
            'fecha'=>$locomotoracuatrohp->fecha,
            'cant_disponible_pto'=>$locomotoracuatrohp->cant_disponible_pto,
            'cant_disponible_mina'=>$locomotoracuatrohp->cant_disponible_mina,

        ];


        return view ('locomotoracuatrohp.edit',compact('locomotoracuatrohp'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LocomotoraCuatroHP  $locomotoraCuatroHP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        LocomotoraCuatroHP::where('id', '=', $id)->update($datos);


        return redirect('locomotoracuatrohp')->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LocomotoraCuatroHP  $locomotoraCuatroHP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1){
            $locomotoracuatrohp=LocomotoraCuatroHP::findOrFail($id);

            $locomotoracuatrohp->delete();

            return redirect('locomotoracuatrohp')->with('EXITO', 'Eliminación satisfactoria');
        }
        else{
            return redirect()->route('locomotoracuatrohp.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
