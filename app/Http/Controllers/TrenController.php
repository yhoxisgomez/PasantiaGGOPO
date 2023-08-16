<?php

namespace App\Http\Controllers;

use App\Models\Tren;
use App\Models\Vagones;
use Illuminate\Http\Request;

class TrenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1,4')->only(['create']);
       $this->middleware('roles:1,4')->only(['edit']);
       $this->middleware('roles:1,4')->only(['form']);


    }
    public function index()
    {
        $data['content_1'] = Tren::get();

        return view('tren.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $data['value_form'] = [
            'id' => '-1',
            'fecha_llegada' => '',
            'turno' => '',
            'contenido' => '',

            'lugar_inicial' => '',
            'numero' => '',




		];
    return view('tren.create',$data);
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

            'fecha_llegada'=> 'required',
            'turno'=> 'required|integer',
            'contenido'=> 'required|string',

            //'lugar_inicial'=> 'required|string',
            'numero'=> 'required|integer',

        ]);

         Tren::create([

            'fecha_llegada'=>$request->fecha_llegada,
            'turno'=>$request->turno,
            'contenido'=>$request->contenido,

           // 'lugar_inicial'=>$request->lugar_inicial,
            'numero'=>$request->numero,


         ]);

        return redirect()->route('tren.index')->with('EXITO', 'Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tren  $tren
     * @return \Illuminate\Http\Response
     */
    public function show(Tren $tren)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tren  $tren
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//funcion para editar
    {
        $tren = Tren::findOrFail($id);
        $data['vagones'] = Vagones::get();

        $data['value_form'] = [

            'id' => $id,
            'fecha_llegada'=>$tren->fecha_llegada,
            'turno'=>$tren->turno,
            'contenido'=>$tren->contenido,

            //'lugar_inicial'=>$tren->lugar_inicial,
            'numero'=>$tren->numero,



        ];


        return view ('tren.edit',compact('tren'),$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tren  $tren
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        Tren::where('id', '=', $id)->update($datos);

        return redirect('tren')
            ->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tren  $tren
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==4){
            $tren=Tren::findOrFail($id);
            $tren->delete();

           return redirect()->route('tren.index')
               ->with('EXITO', 'Eliminación satisfactoria');
        }
        else if ($user==2 || $user==3 ){
            return redirect()->route('tren.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
