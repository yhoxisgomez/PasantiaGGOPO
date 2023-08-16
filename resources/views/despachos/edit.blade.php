@extends('adminlte::page')

@section('content')
 <div class="wrapper">
<div class="card-header"><h4 class="text-center">ACTUALIZAR DESPACHO</h4></div>
<div class="card-body">
<form action="{{url('/despachos/'.$despachos->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('despachos.form',['Modo'=>'editar'])

</form>
</div>
@endsection
