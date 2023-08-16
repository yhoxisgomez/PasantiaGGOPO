<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToArray;

class ClienteController extends Controller
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
      // $this->middleware('roles:1')->only($id);


    }
    public function index()
    {

       $clientes = Cliente::get();


     return view('clientes.index', compact('clientes'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('clientes.create');
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
            'tipo_cliente'=> 'required|string',




        ];

            $Mensaje=["required"=> 'El :attribute es requerido'];
            $this->validate($request,$campos,$Mensaje);

            Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('EXITO', 'Creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despacho  $despacho
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despacho  $despacho
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::findOrFail($id);
        return view ('clientes.edit',compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despacho  $despacho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $datos=Request()-> except(['_token', '_method']);

        Cliente::where('id', '=', $id)->update($datos);

        return redirect('clientes')
            ->with('EXITO', 'Actualización exitosa');
    }


    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1 || $user==3){
            $clientes=Cliente::findOrFail($id);
            $clientes->delete();

            return redirect()->route('clientes.index')
            ->with('EXITO', 'Eliminación satisfactoria');
        }
        else{
            return redirect()->route('clientes.index')
            ->with('AVISO', 'Usuario no Autorizado');

        }



    }
}
