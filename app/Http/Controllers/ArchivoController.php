<?php

namespace App\Http\Controllers;
use App\Models\Vagones;
use App\Models\Despacho;
use App\Models\Cliente;
use App\Models\Mineral;
use App\Models\Barco;
use App\Models\Camion;

use Illuminate\Http\Request;
use DB;

class ArchivoController extends Controller
{
    public function PDF(){


        $consultanio = DB::select(DB::raw("SELECT extract(year from fecha_vaciado) AS anio,
        SUM(cant_tolva_vaciado) AS cant_tolva, SUM(cant_gondola_volteado) AS cant_gondola,
        SUM(cant_tolva_vaciado*90)AS ton_tolva, SUM(cant_gondola_volteado *89) AS ton_gondola,
        SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89)) AS total_ton
        from vagones GROUP BY anio ORDER BY anio ASC"));

        $consulta_mes = DB::select(DB::raw("SELECT extract(month from fecha_vaciado) AS mes,
        SUM(cant_tolva_vaciado) AS cant_tolva, SUM(cant_gondola_volteado) AS cant_gondola,
        SUM(cant_tolva_vaciado*90)AS ton_tolva, SUM(cant_gondola_volteado *89) AS ton_gondola,
        SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89)) AS total_ton
        from vagones where extract(month from fecha_vaciado)= extract(month from fecha_vaciado)
		AND extract(year from fecha_vaciado) = extract(year from created_at)
		GROUP BY mes ORDER BY mes ASC "));

        $consulta_semana=  DB::select(DB::raw("SELECT extract(week from fecha_vaciado) AS semana, extract(month from fecha_vaciado) AS mes,
        SUM(cant_tolva_vaciado) AS cant_tolva, SUM(cant_gondola_volteado) AS cant_gondola,
        SUM(cant_tolva_vaciado*90)AS ton_tolva, SUM(cant_gondola_volteado *89) AS ton_gondola,
        SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89)) AS total_ton
        from vagones where extract(month from fecha_vaciado)= extract(month from fecha_vaciado)
		AND extract(week from fecha_vaciado) = extract(week from created_at)
		GROUP BY semana,mes ORDER BY semana, mes ASC"));

        $consulta_dia=  DB::select(DB::raw("SELECT fecha_vaciado,
        SUM(cant_tolva_vaciado) AS cant_tolva, SUM(cant_gondola_volteado) AS cant_gondola,
        SUM(cant_tolva_vaciado*90)AS ton_tolva, SUM(cant_gondola_volteado *89) AS ton_gondola,
        SUM((cant_tolva_vaciado*90) + (cant_gondola_volteado*89)) AS total_ton
        from vagones where fecha_vaciado =now()::date
		GROUP BY fecha_vaciado  ORDER BY fecha_vaciado ASC"));

       //dd($consulta_mes);


        $pdf=  \PDF::loadView('Informe',compact('consultanio','consulta_mes','consulta_semana','consulta_dia'));

       // return $pdf->stream('Informe.pdf');

        return $pdf->setPaper('a4','landscape')->stream('Informe.pdf');
    }
}
