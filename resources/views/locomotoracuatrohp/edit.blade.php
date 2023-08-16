@extends('adminlte::page')

@section('content')
 <div class="wrapper">
<div class="card-header"><h4 class="text-center">ACTUALIZAR LOCOMOTORAS 4000HP</h4></div>
<div class="card-body">
<form action="{{url('/locomotoracuatrohp/'.$locomotoracuatrohp->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('locomotoracuatrohp.form',['Modo'=>'editar'])

</form>
</div>
@endsection
