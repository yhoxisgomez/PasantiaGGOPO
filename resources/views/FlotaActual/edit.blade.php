@extends('adminlte::page')

@section('content')
 <div class="wrapper">

<form action="{{url('/FlotaActual/'.$FlotaActual->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('FlotaActual.form',['Modo'=>'editar'])

</form>
</div>
@endsection
