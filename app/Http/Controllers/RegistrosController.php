<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vagones;
use App\Extensions\Tools;
use App\Models\User;
use JsonResponse;
use DB;
use HttpResponseException;

class RegistrosController extends Controller
{
    public function __construct()
    {
       $this->middleware('roles:1,2')->only(['index']);

    }
    public function index()
    {
        return view('historial.index');

    }

    public function RegistroProduccion(Request $request, $fecha_inicio, $fecha_fin){


        $vagones = DB::table('vagones')

            ->selectRaw ('fecha_vaciado, SUM(cant_tolva_vaciado) AS Cant_Tolva, SUM(cant_gondola_volteado) AS Cant_Gondola,
            SUM(cant_tolva_vaciado*90)AS Ton_Tolva, SUM(cant_gondola_volteado *89) AS Ton_Gondola,
            SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89)) AS Total_Ton,
            SUM(cant_disponible_tolva) AS Cant_disp_Tolva, SUM(cant_disponible_gondola) AS Cant_disp_Gond')
           ->whereBetween('fecha_vaciado', [$fecha_inicio, $fecha_fin])
           ->groupBy('fecha_vaciado')
           ->orderBy('fecha_vaciado')
           ->get();

        echo json_encode ($vagones);



    }
}
