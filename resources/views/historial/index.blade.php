@extends('adminlte::page')
@section('title', 'Historial')

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


  <div class="card">
  <div class="card-body table-responsive{-sm|-md|-lg|-xl}">
  <center><h2>HISTÓRICO DE OPERACIONES - PRODUCCIÓN</h2></center></br></br>

<!-- INICIO PARA BUSCAR LAS FECHAS-->

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

        console.log("Clicked! Busca Fechas22222222222");

        let FechaInicio = $('#fecha_inicio').val();
        let FechaFin = $('#fecha_fin').val();
        console.log(" valor fecha inicio " + FechaInicio + " valor fecha fin "+ FechaFin);

        const route = '/historial/'+FechaInicio +'/'+ FechaFin;
        console.log('/historial/'+FechaInicio +'/'+ FechaFin);

        const data = new FormData();
        data.append(FechaInicio,FechaFin);

        console.log(...data);

        function sleep(milliseconds) {

            var start = new Date().getTime();

            for (var i = 0; i < 1e7; i++) {
                if ((new Date().getTime() - start) > milliseconds) {
                break;
                }
            }
        }
        sleep(10000);

     $.ajax(route, {
            type: 'get',
            data,
            processData: false,
            contentType: false,
            success: function (result) {
                const { data } = result;

                console.log(result);
            },

            error: function (error) {
                console.log("Error de petición");

            },


    });



    });


    </script>

@endsection

<!-- FIN PARA BUSCAR LAS FECHAS-->


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



@endsection
