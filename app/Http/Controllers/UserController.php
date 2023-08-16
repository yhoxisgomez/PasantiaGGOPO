<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Rol;

use Illuminate\Support\Collection;




class UserController extends Controller
{
    public function __construct()
    {


       $this->middleware('roles:1,2,3,4')->only(['index']);
       $this->middleware('roles:1')->only(['create']);
       $this->middleware('roles:1')->only(['edit']);
       $this->middleware('roles:1')->only(['form']);


    }
    public function index()
    {
        $data['content_1'] = User::get();
        //dd($data);

        return view('usuarios.index',$data);

    }




    public function edit($id)
    {
        $usuarios= User::findOrFail($id);
        $data['rol'] = Rol::get();

        $data['value_form'] = [

            'id' => $id,
            'name'=>$usuarios->name,
            'email'=>$usuarios->email,
            'password'=>$usuarios->password,
            'rol_id' => $usuarios->rol_id,
        ];

        return view ('usuarios.edit',compact('usuarios'),$data);
    }



    public function update(Request $request, $id)
    {
        echo('hola actualizando');
        $datos=Request()-> except(['_token', '_method']);
        User::where('id', '=', $id)->update($datos);

        //return redirect('usuarios')->with('EXITO', 'Actualización exitosa');
    }

    public function destroy($id)
    {
        $user= auth()->user()->rol_id;

        if($user==1){
            $usuarios=User::findOrFail($id);
            $usuarios->delete();
            return redirect('usuarios')->with('EXITO', 'Eliminación satisfactoria');
        }
        else {
            return redirect('usuarios')->with('AVISO', 'Usuario no Autorizado');

        }

    }



}
