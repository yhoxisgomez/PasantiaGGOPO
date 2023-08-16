<!DOCTYPE html>

<html lang="es">

    <head>
        <meta charset="UTF-8">
        <style>
            .titulos{
                background: rgb(150, 0, 27) !important; color: #FFF;
            }
            img{

                float: center;

                height: 100px;
                width: 120px;


            }
            table{
                width: 100%;
                border: 1px solid #000;
                border-spacing: 0;
                font-family: "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
            th,td{
                width: 25%;
                border: 1px solid #000;
                border-collapse: collapse;
                padding: 0.3em;
                font-family: "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";


            }
            body {
                color: black;

                font-weight: normal;
                font-family: "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

            }

        </style>

    </head>


    <body>

        @php
            $diactual = date('d-m-Y');
            $fecha = new DateTime($diactual);
            $semana = $fecha->format('W');
            $mes = $fecha->format('m');
            $anio = $fecha->format('Y');

        @endphp



           <img src="img/logo-informe.png">

            <h3 align="center">CVG FERROMINERA ORINOCO</h3>
            <h3 align="center">GERENCIA GENERAL DE OPERACIONES PUERTO ORDAZ</h3>
            <h5>Pto Ordaz {{$diactual}}</h5>

            <h4 align="center">HISTÓRICO DE PRODUCCIÓN POR AÑO</h4>
            <table align="center" >
                <tr class="titulos">

                    <th>Año</th>
                    <th>Cant Tolv. Vaciadas</th>
                    <th>Cant Gond. Volteadas</th>
                    <th>Cant Tolv. Vaciadas (t) </th>
                    <th>Cant Gond. Volteadas (t) </th>
                    <th>Total (t) </th>



                </tr>



                @foreach($consultanio as $a)




                    <tr>
                        <td align="center">{{$a->anio}}</td>
                        <td align="center">{{ number_format($a->cant_tolva) }} </td>
                        <td align="center">{{ number_format($a->cant_gondola) }} </td>
                        <td align="center">{{ number_format($a->ton_tolva) }} </td>
                        <td align="center">{{ number_format($a->ton_gondola) }} </td>
                        <td align="center">{{ number_format($a->total_ton) }} </td>


                @endforeach

                    </tr>

            </table>

        <h4 align="center">HISTÓRICO DE PRODUCCIÓN DE LOS MESES DEL AÑO ACTUAL </h4>

        <table align="center" >
            <tr class="titulos">

                <th>Mes</th>
                <th>Cant Tolv. Vaciadas</th>
                <th>Cant Gond. Volteadas</th>
                <th>Cant Tolv. Vaciadas (t) </th>
                <th>Cant Gond. Volteadas (t) </th>
                <th>Total (t) </th>



            </tr>







            @foreach($consulta_mes as $m)
                <tr>

                    <td align="center">{{$m->mes}}</td>
                    <td align="center">{{ number_format($m->cant_tolva) }} </td>
                    <td align="center">{{ number_format($m->cant_gondola) }} </td>
                    <td align="center">{{ number_format($m->ton_tolva) }} </td>
                    <td align="center">{{ number_format($m->ton_gondola) }} </td>
                    <td align="center">{{ number_format($m->total_ton) }} </td>


             @endforeach
                </tr>

        </table>

        <h4 align="center">HISTÓRICO DE PRODUCCIÓN DE LA SEMANA ACTUAL </h4>

        <table align="center" >
            <tr class="titulos">

                <th>Semana</th>
                <th>Mes</th>
                <th>Cant Tolv. Vaciadas</th>
                <th>Cant Gond. Volteadas</th>
                <th>Cant Tolv. Vaciadas (t) </th>
                <th>Cant Gond. Volteadas (t) </th>
                <th>Total (t) </th>



            </tr>


            @foreach($consulta_semana as $s)
                <tr>


                    <td align="center">{{$s->semana}}</td>
                    <td align="center">{{$s->mes}}</td>
                    <td align="center">{{ number_format($s->cant_tolva) }} </td>
                    <td align="center">{{ number_format($s->cant_gondola) }} </td>
                    <td align="center">{{ number_format($s->ton_tolva) }} </td>
                    <td align="center">{{ number_format($s->ton_gondola) }} </td>
                    <td align="center">{{ number_format($s->total_ton) }} </td>


             @endforeach
                </tr>

        </table>

        <h4 align="center">HISTÓRICO DE PRODUCCIÓN DEL DÍA</h4>

        <table align="center" >
            <tr class="titulos">
                <th>Fecha</th>
                <th>Cant Tolv. Vaciadas</th>
                <th>Cant Gond. Volteadas</th>
                <th>Cant Tolv. Vaciadas (t) </th>
                <th>Cant Gond. Volteadas (t) </th>
                <th>Total (t) </th>



            </tr>


            @foreach($consulta_dia as $d)
                <tr>

                    <td align="center">{{$d->fecha_vaciado}}</td>

                    <td align="center">{{ number_format($d->cant_tolva) }} </td>
                    <td align="center">{{ number_format($d->cant_gondola) }} </td>
                    <td align="center">{{ number_format($d->ton_tolva) }} </td>
                    <td align="center">{{ number_format($d->ton_gondola) }} </td>
                    <td align="center">{{ number_format($d->total_ton) }} </td>


             @endforeach
                </tr>

        </table>

    </body>
</html>
