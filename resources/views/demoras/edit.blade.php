@extends('adminlte::page')

@section('content')
<div class="card-header"><h4 class="text-center">ACTUALIZAR DEMORA</h4></div>
<div class="card-body">
<form action="{{url('/demoras/'.$demoras->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('demoras.form',['Modo'=>'editar'])

</form>
</div>
@endsection
