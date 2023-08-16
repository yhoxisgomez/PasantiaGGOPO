<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Models\Disponibilidad;
use App\Models\Transporte;
use App\Models\Procesamiento;
use App\Models\Despacho;
use App\Models\Cliente;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\LocomotoraDosHP;
use App\Models\LocomotoraCuatroHP;
use App\Models\Vagones;
use App\Models\Tren;
use App\Models\Flota;
use App\Models\FlotaActual;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $content['locomotora2hp'] = DB::select(DB::raw("select SUM(cant_disponible) from locomotora2hp
        where fecha =now()::date"));

        $content['locomotora4hp'] = DB::select(DB::raw("select SUM(cant_disponible_pto) AS pto,
        SUM(cant_disponible_mina) AS mina from locomotora4hp where fecha =now()::date"));

        $content['vagones'] = Vagones::select("cant_tolva_vaciado","cant_gondola_volteado","cant_disponible_tolva","cant_disponible_gondola","fecha_vaciado")
        ->get();

        $content['vagones_disponibles_tolva'] = DB::select(DB::raw("select SUM(cant_disponible_tolva) from vagones
        where fecha_vaciado =now()::date"));

        $content['vagones_disponibles_gondola'] = DB::select(DB::raw("select SUM(cant_disponible_gondola) from vagones
        where fecha_vaciado =now()::date"));

        $content['flota'] = Flota::get();

        $content['flota_actual'] = FlotaActual::get();




        return view('home', $content);
      // return($content2);
    }
}
