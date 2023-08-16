<?php

namespace App\Http\Controllers;

use App\Models\Vagones;
use App\Models\Tren;
use Illuminate\Http\Request;
use App\Extensions\Tools;
use App\Models\User;
use JsonResponse;
use DB;
use HttpResponseException;
class VagonesController extends Controller
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
       /* $content['vagones2'] = DB::select(DB::raw("SELECT (SUM (cant_gondola_volteado + cant_tolva_vaciado))/
        (SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89))) AS capacidad
        from vagones where fecha_vaciado = fecha_vaciado "));*/

       /* $vagones2 = DB::table('vagones')

        ->selectRaw ('(SUM (cant_gondola_volteado + cant_tolva_vaciado))/
        (SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89))) AS capacidad')
       ->where('fecha_vaciado','fecha_vaciado')
       ->get();*/

        $vagones = Vagones::get();

        return view('vagones.index', compact('vagones'));





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vagones.create');
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
            'fecha_vaciado'=> 'required',

            'turno'=> 'required|integer',
            'cant_tolva_vaciado' => 'required|integer',
            'cant_disponible_tolva'=> 'required|integer',
            'cant_gondola_volteado'=> 'required|integer',
            'cant_disponible_gondola'=> 'required|integer',



        ];

            $Mensaje=["required"=> 'El :attribute es requerido'];



        $this->validate($request,$campos,$Mensaje);

        Vagones::create($request->all());

        if(Vagones::isExist($request->fecha_vaciado,$request->turno)){
            return redirect('vagones')->with('ERROR', 'Ya existe turno');
        }

        return redirect()->route('vagones.index')->with('EXITO', 'Creado satisfactoriamente.');


    }
    public function consultaFechas(Request $request, $fecha_inicio, $fecha_fin){

       //$ruta= "{{url('/vagones/'.$fecha_inicio.'/'.$fecha_fin)}}";
        $vagones = DB::table('vagones')

            ->selectRaw ('SUM(cant_tolva_vaciado) AS cant_tolva, SUM(cant_gondola_volteado) AS cant_gondola,
            SUM(cant_tolva_vaciado + cant_gondola_volteado) AS total_vagones,
            SUM(cant_tolva_vaciado*90)AS ton_tolva, SUM(cant_gondola_volteado *89) AS ton_gondola,
            SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89)) AS total_ton')

           ->whereBetween('fecha_vaciado', [$fecha_inicio, $fecha_fin])

            ->get();


        return ($vagones);
       // return view ($ruta,compact('vagones'));
        //echo($vagones);
       // return redirect()->route("{{url('/vagones/'.$fecha_inicio.'/'.$fecha_fin)}}");



       // sleep(100);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vagones  $vagones
     * @return \Illuminate\Http\Response
     */
    public function show(Vagones $vagones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vagones  $vagones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vagones = Vagones::findOrFail($id);
        return view ('vagones.edit',compact('vagones'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vagones  $vagones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos=Request()-> except(['_token', '_method']);

        Vagones::where('id', '=', $id)->update($datos);


        return redirect('vagones')->with('EXITO', 'Actualización exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vagones  $vagones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1){
            $vagones=Vagones::findOrFail($id);

            $vagones->delete();

            return redirect('vagones')->with('EXITO', 'Eliminación satisfactoria');
        }
        else {
            return redirect()->route('vagones.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }


    }


}
