@extends('adminlte::page')
@section('title', 'Vagones')

@if(Session::has('Mensaje')){{
  Session::get('Mensaje')
}}
@endif
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<style>
    .import{
        background: rgb(150, 0, 27) !important; color: #FFF;
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #FFF !important;
        background-color: rgb(150, 0, 27) !important;
        border: 1px solid #dee2e6 !important;
    }
    .page-link:hover {
    z-index: 2;
    color: rgb(150, 0, 27) !important;
    text-decoration: none;
    background-color:rgb(209, 68, 94) !important;
    border-color: #dee2e6 !important;
  }
  .page-link:focus {
  z-index: 3;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(150, 0, 27, 0.514) !important;
}
</style>
@endsection
@section('content')


  <a href="{{url('vagones/create')}}"class="btn btn-app"><i class="fa fa-plus-circle"></i>Registrar</a>
  <a href="{{ route('descargarPDF') }}"class="btn btn-app"><i class="fa fa-book"></i>Informe</a>
  <div class="card">

    <div class="card-body table-responsive{-sm|-md|-lg|-xl}">
                         <!-- INICIO PARA BUSCAR LAS FECHAS-->
        <center><h2>HISTÓRICO</h2></center><br>

<form class="form-horizontal" method="post" id = "cuthulu">
    @csrf


    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <label for="fecha_inicio">{{'Fecha Inicio'}}</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required value="{{ old('scheduled_date', date('Y-m-d')) }}" >

            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
            <label for="fecha_fin">{{'Fecha Fin'}}</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required value="{{ old('scheduled_date', date('Y-m-d')) }}">

            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
               <label for="plan">{{'Plan Durante el Periodo Indicado'}}</label>
               <input type="number" class="form-control" name="plan" id="plan" required value="number">
            </div>
       </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" id="buscar" class="btn btn-app"> <i class="fa fa-search-plus"></i>Buscar</button>

        </div>
    </div>
</form>
 <table id="busqueda" class="table table-responsive-sm table-striped table-bordered" style="text-align:center">
 </table>


@section('extra-scripts2')

    <script>


    console.log("Clicked! Busca Fechas");


    $('#buscar').click(function (evt) {
        evt.preventDefault();

        console.log("Clicked! Busca Fechas22222222222");

        let FechaInicio = $('#fecha_inicio').val();
        let FechaFin = $('#fecha_fin').val();
        let plan=0;

        plan = $('#plan').val();

        console.log(" valor fecha inicio " + FechaInicio + " valor fecha fin "+ FechaFin);

        const route = '/vagones/'+FechaInicio +'/'+ FechaFin;
        console.log('/vagones/'+FechaInicio +'/'+ FechaFin);

        const data = new FormData();
        data.append(FechaInicio,FechaFin);

        console.log(...data);

     $.ajax(route, {
            type: 'get',

            success: function (result) {

                console.log(...result);


                console.log(plan);


                for (let i=0; i<result.length; i++)
                {


                    result[i];
                    let capacidad=0;
                    capacidad= (result[i].total_ton)/(result[i].total_vagones);
                    let cumplimiento=0;

                    if(plan != 0){
                        cumplimiento= (result[i].total_ton)/plan;
                    }

                    console.log(cumplimiento);
                    console.log(capacidad);
                    console.log("tolva",result[i].cant_tolva);
                    console.log("gond",result[i].cant_gondola);
                    console.log("t tolv",result[i].ton_tolva);
                    console.log("t gond",result[i].ton_gondola);
                    console.log("t tol",result[i].total_ton);

                    $('#busqueda').append(`

                        <thead class="import">

                            <th>Cant Tolv. Vaciadas</th>
                            <th>Cant Gond. Volteadas</th>
                            <th>Cant Tolv. Vaciadas (t) </th>
                            <th>Cant Gond. Volteadas (t) </th>
                            <th>Total (t) </th>
                            <th>Capacidad</th>
                            <th>Cumplimiento del Plan (%)</th>


                            </thead>

                            <tbody style="text-align:center">


                            <tr>


                                <td>${result[i].cant_tolva}</td>
                                <td>${result[i].cant_gondola}</td>
                                <td>${result[i].ton_tolva}</td>
                                <td>${result[i].ton_gondola}</td>
                                <td>${result[i].total_ton}</td>
                                <td>${capacidad}</td>
                                <td>${cumplimiento}</td>



                            </tr>

                            </tbody>



                    `)

                }



            },


            error: function (error) {
                console.log("Error de petición");

            },

    });

    $("#busqueda").empty();



});


    </script>

@endsection

<!-- FIN PARA BUSCAR LAS FECHAS-->
     <br><center><h2>VAGONES/PRODUCCIÓN</h2></center><br>

        <table id="vagones" class="table table-responsive-sm table-striped table-bordered" style="text-align:center">

                <thead class="import">

                        <th>Fecha</th>
                        <th>Semana</th>
                        <th>Turno</th>
                        <th>Cant Vag. Tolv. Disponibles</th>
                        <th>Cant Vag. Gond. Disponibles</th>
                        <th>Cant Tolv. Vaciadas</th>
                        <th>Cant Gond. Volteadas</th>

                        <th>Acción</th>
                </thead>

                    <tbody style="text-align:center">

                        @foreach($vagones as $v)





                            <tr>


                                <td>{{$v['fecha_vaciado']}}</td>
                                @php
                                 $sem =date('W', strtotime($v->fecha_vaciado));

                                @endphp


                                <td>{{$sem}}</td>
                                <td>{{$v['turno']}}</td>
                                <td>{{ number_format($v['cant_disponible_tolva']) }} </td>
                                <td>{{ number_format($v['cant_disponible_gondola']) }} </td>
                                <td>{{ number_format($v['cant_tolva_vaciado']) }} </td>
                                <td>{{ number_format($v['cant_gondola_volteado']) }} </td>




                                <td>

                                    <a class="btn btn-app" href="{{url('/vagones/'.$v->id.'/edit')}}"><i class="fa fa-edit"></i>Editar</a>

                                    <form method="post" action="{{url('/vagones/'.$v->id)}}" style="display:inline">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class= "btn btn-app" type="submit" onclick="return confirm('¿Borrar?');"><i class="fa fa-trash-alt"></i>Borrar</button>
                                    </form>
                                </td>

                        @endforeach
                           </tr>
                    </tbody>


     </div>
        </table>




</div>


</div>





</section>

@endsection


@section('js')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#vagones').DataTable();
} );
</script>


@endsection
