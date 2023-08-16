@extends('adminlte::page')
@section('title', 'Tren')

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


  <a href="{{url('tren/create')}}"class="btn btn-app"><i class="fa fa-plus-circle"></i>Registrar
  </a>
  <div class="card">
  <div class="card-body table-responsive{-sm|-md|-lg|-xl}">
<center><h2>TRENES</h2></center>
<table id="tren" class="table table-responsive-sm table-striped table-bordered" style="text-align:center">
            <!--thead class="thead-light"-->
            <thead class="import">



              <th>Fecha LLegada</th>
              <th>Semana</th>
              <th>Turno</th>
              <th>Numero</th>
              <th>Contenido</th>
              <th>Lugar Inicial</th>


              <th>Acción</th>
            </thead>

            <tbody style="text-align:center">
                @foreach ($content_1 as $c)
                <tr>
                    @php
                    $sem =date('W', strtotime($c->fecha_llegada));
                    @endphp



                    <td>{{$c['fecha_llegada']}}</td>
                    <td>{{$sem}}</td>
                    <td>{{$c['turno']}}</td>
                    <td>{{$c['numero']}}</td>
                    <td>{{$c['contenido']}}</td>

                    @php
                    if((($c->numero)%2) == 0){
                        $c->lugar_inicial='Mina';


                    }else{
                        $c->lugar_inicial='Puerto Ordaz';
                    }
                    @endphp

                    <td>{{$c['lugar_inicial']}}</td>






                    <td>

                    <a class="btn btn-app" href="{{url('/tren/'.$c->id.'/edit')}}"><i class="fa fa-edit"></i>Editar
                    </a>

                     <form method="post" action="{{url('/tren/'.$c->id)}}" style="display:inline">
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
    $('#tren').DataTable();
</script>
@endsection
