<?php

namespace App\Http\Controllers;

use App\Models\Demora;
use App\Models\Transporte;
use App\Models\Procesamiento;
use Illuminate\Http\Request;

class DemoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1,3,4')->only(['create']);
       $this->middleware('roles:1,3,4')->only(['edit']);
       $this->middleware('roles:1,3,4')->only(['form']);


    }
    public function index()
    {
        $datos1['demoras']=Demora::get();
        return view('demoras.index',$datos1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demoras.create');

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

            'turno' => 'required',
            'departamento' => 'required',
            'descripcion' => 'required'
        ]);

        if(Demora::isExist($request->fecha,$request->departamento)){
            return redirect('demoras')->with('ERROR', 'Ya existe');
        }


        Demora::create($request->all());

        return redirect('demoras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demora  $demora
     * @return \Illuminate\Http\Response
     */
    public function show(Demora $demora)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demora  $demora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	$demoras = Demora::findOrFail($id);
        return view('demoras.edit', compact('demoras'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demora  $demora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $datos=Request()-> except(['_token', '_method']);

        Demora::where('id', '=', $id)->update($datos);
        return redirect('demoras')
            ->with('Demora actualizada satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demora  $demora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3 || $user==4){
            $demoras=Demora::findOrFail($id);

            $demoras->delete();

            return redirect()->route('demoras.index')
                ->with('Demora eliminada satisfactoriamente');
        }
        else if ($user==2){
            return redirect()->route('demoras.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }

    }
}
