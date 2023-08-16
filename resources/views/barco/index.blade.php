
@extends('adminlte::page')
@section('title', 'Barco')

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


  <a href="{{url('barco/create')}}"class="btn btn-app"><i class="fa fa-plus-circle"></i>Registrar
  </a>
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
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicioD" required value="{{ old('scheduled_date', date('Y-m-d')) }}" >

                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                <label for="fecha_fin">{{'Fecha Fin'}}</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_finD" required value="{{ old('scheduled_date', date('Y-m-d')) }}">

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                                <button type="submit" id="buscarD" class="btn btn-app"> <i class="fa fa-search-plus"></i>Buscar</button>

                            </div>
                        </div>
                    </form>

                     <table id="busquedaD" class="table table-responsive-sm table-striped table-bordered" style="text-align:center">
                     </table>


                    @section('extra-scripts5')

                        <script>


                        console.log("Clicked! Busca Fechas");


                        $('#buscarD').click(function (evt) {
                            evt.preventDefault();

                            console.log("Clicked! Busca Fechas22222222222");

                            let FechaInicioD = $('#fecha_inicioD').val();
                            let FechaFinD = $('#fecha_finD').val();




                            console.log(" valor fecha inicio " + FechaInicioD + " valor fecha fin "+ FechaFinD);

                            const route = '/barco/'+FechaInicioD +'/'+ FechaFinD;
                            console.log('/barco/'+FechaInicioD +'/'+ FechaFinD);

                            const dataD = new FormData();
                            dataD.append(FechaInicioD,FechaFinD);

                            console.log(...dataD);

                         $.ajax(route, {
                                type: 'get',
                                success: function (result) {
                                 console.log("entre a sucess ajax");
                                 console.log(result);

                                 for (let i=0; i<result.length; i++)
                                 {


                                     result[i];



                                     $('#busquedaD').append(`

                                         <thead class="import">

                                             <th>Total Toneladas FMO</th>

                                             <th>Total Toneladas Cliente</th>


                                             </thead>

                                             <tbody style="text-align:center">


                                             <tr>

                                                 <td>${result[i].tonfmo}</td>
                                                 <td>${result[i].toncliente}</td>




                                             </tr>

                                             </tbody>



                                     `)

                                 }






                                },


                                error: function (error) {
                                    console.log("Error de petición");

                                },

                        });

                        $("#busquedaD").empty();



                    });


                        </script>

                    @endsection

                    <!-- FIN PARA BUSCAR LAS FECHAS-->
<br>
<center><h2>BARCOS</h2></center>
<table id="barco" class="table table-responsive-sm table-striped table-bordered" style="text-align:center">
            <!--thead class="thead-light"-->
            <thead class="import">

              <th>Nombre</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Turno Inicial</th>
              <th>Turno Final</th>
              <th>Muelle</th>
              <th>Tipo de Barco</th>
              <th>Toneladas FMO</th>
              <th>Toneladas Cliente</th>
              <th>Acción</th>
            </thead>

            <tbody style="text-align:center">
                @foreach ($content_1 as $c)
                <tr>

                    <td>{{$c['nombre']}}</td>
                    <td>{{$c['fecha_inicio']}}</td>
                    <td>{{$c['fecha_fin']}}</td>
                    <td>{{$c['turno_inicio']}}</td>
                    <td>{{$c['turno_fin']}}</td>
                    <td>{{$c['lugar_carga']}}</td>
                    <td>{{$c['tipo_barco']}}</td>
                    <td>{{ number_format($c['toneladas_fmo']) }} </td>
                    <td>{{ number_format($c['toneladas_cliente']) }} </td>


                    <td>

                    <a class="btn btn-app" href="{{url('/barco/'.$c->id.'/edit')}}"><i class="fa fa-edit"></i>Editar
                    </a>

                     <form method="post" action="{{url('/barco/'.$c->id)}}" style="display:inline">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                    <button class= "btn btn-app" type="submit" onclick="return confirm('¿Borrar?');"><i class="fa fa-trash-alt"></i>Borrar</button>
                            </form>
                    </td>
                @endforeach
                </tr>
            </tbody>
      	</table>
</div></div>
      </section>
      @endsection
      @section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $('#barco').DataTable();
</script>
@endsection
