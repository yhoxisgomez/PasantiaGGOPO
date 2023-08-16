@extends('adminlte::page')

@section('content')

<form action="{{url('/actividades/'.$actividades->id)}} " method="POST" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('actividades.form',['Modo'=>'editar'])

</form>
</div>
@endsection