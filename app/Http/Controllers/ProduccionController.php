<?php

namespace App\Http\Controllers;



use App\Models\Camion;
use App\Models\Tren;

use App\Models\Produccion;

use App\Models\Vagones;
use App\Models\User;


use Illuminate\Http\Request;
use DB;

class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $rol= User::select("rol_id")
        ->get();

        //$data['content_1'] = Produccion::get();
        $data['content_1'] = Produccion::get();

        foreach ($data['content_1'] as $row) {


            $vagonesRow = Vagones::where('tren_id', $row['id'])->get();


            if ($vagonesRow == null) {
                break;
            }
             return $vagonesRow;



        }


        return view('produccion.index',$data);
    }
    public function consultaFechas($fecha_inicio, $fecha_fin){

        $vagones = DB::table('vagones')
           ->whereBetween('fecha_vaciado', [$fecha_inicio, $fecha_fin])
           /*->SUM('cant_tolva_vaciado')
           ->SUM('cant_gondola_volteado')
           ->SUM('cant_tolva_vaciado' *90)
           ->SUM('cant_gondola_volteado' *89)
           ->SUM(('cant_tolva_vaciado' *90) + ('cant_gondola_volteado' *89))*/
           ->get();


        return $vagones;

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tren'] = Tren::get();
        $data2['vagones'] = Vagones::get();
       // $data3['camion']=Camion::get();


        $data['value_form'] = [
            'id' => '-1',
            'n_semana' => '',
            'turno' => '',
            'observacion' => '',
            'tren_id' => '',

            //'camion_id'=>'',


		];


        return view('produccion.create', $data,$data2);

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

            'tren_id'=> 'required|exists:tren,id',
            //'camion_id'=> 'required|exists:camion,id',
            'n_semana'=> 'required|integer',
            'turno'=> 'required|integer',
            'observacion'=> 'required|string',

        ]);

Produccion::create([

    'tren_id'=>$request->tren_id,
    //'camion_id'=>$request->camion_id,
    'n_semana'=>$request->n_semana,
    'turno'=>$request->turno,
    'observacion'=>$request->observacion,



 ]);


         return redirect('produccion')->with('EXITO', 'Creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaciado  $vaciado
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaciado  $vaciado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        $data['tren'] = Tren::get();
        $data2['vagones'] = Vagones::get();


        $data['value_form'] = [

            'id' => $id,

            'n_semana'=>$produccion->n_semana,
            'turno'=>$produccion->turno,
            'observacion'=>$produccion->observacion,
           /* 'cant_tolva'=>$data2->cant_tolva,
            'cant_gondola'=>$produccion->cant_gondola,*/
            //'tren_id' => $produccion->tren_id,
        ];


        return view ('produccion.edit',compact('produccion'),$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaciado  $vaciado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaciado  $vaciado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
