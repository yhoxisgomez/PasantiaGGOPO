@extends('adminlte::page')

@section('content')
 <div class="wrapper">
<div class="card-header"><h4 class="text-center">ACTUALIZAR CAMION</h4></div>
<div class="card-body">
<form action="{{url('/camion/'.$camion->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('camion.form',['Modo'=>'editar'])

</form>
</div>
@endsection
