@extends('adminlte::page')

@section('content')
 <div class="wrapper">
<div class="card-header"><h4 class="text-center">ACTUALIZAR TREN</h4></div>
<div class="card-body">
<form action="{{url('/tren/'.$tren->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('tren.form',['Modo'=>'editar'])

</form>
</div>
@endsection
