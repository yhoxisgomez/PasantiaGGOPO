@extends('adminlte::page')
@section('title', 'Demora')
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

	<a href="{{url('demoras/create')}}" class="btn btn-app">
      <i class="fa fa-plus-circle "></i>Registrar</a>

<div class="card">
  <div class="card-body table-responsive{-sm|-md|-lg|-xl}">

<center><h3>DEMORAS</h3></center>
 <table id="demoras" class="table table-responsive-sm table-striped table-bordered" style="text-align:center">
    <thead class="import">

            <th>Fecha</th>
            <th>Semana</th>
            <th>Turno</th>
			<th>Responsable</th>
			<th>Descripción</th>
			<th>Acciones</th>
	</thead>

	<tbody>
		@foreach ($demoras as $d)
		<tr>
            @php
            $sem =date('W', strtotime($d->fecha));
            @endphp






            <td>{{$d->fecha}}</td>
            <td>{{$sem}}</td>
            <td>{{$d->turno}}</td>
			<td>{{$d->departamento}}</td>
			<td>{{$d->descripcion}}</td>

			<td>

				<a class="btn btn-app" href="{{url('/demoras/'.$d->id.'/edit')}}"><i class="fa fa-edit"></i>Editar</a>



				<form method="post" action="{{url('/demoras/'.$d->id)}}" style="display:inline">
					{{csrf_field()}}
					{{method_field('DELETE')}}
				<button class= "btn btn-app" type="submit" onclick="return confirm('¿Borrar?');"><i class="fa fa-trash-alt"></i>Borrar</button>

				</form>
			</td>

		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $('#demoras').DataTable();
</script>
@endsection
