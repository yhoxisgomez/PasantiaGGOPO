@extends('adminlte::page')

@section('content')


@if(Session::has('Mensaje')){{
	Session::get('Mensaje')
}}
@endif
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">

    <ul>
        @foreach($errors->all() as $error)

        <li> {{$error}} </li>

        @endforeach
    </ul>


</div>
@endif


<form action="{{url('/actividades')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}

@include('actividades.form',['Modo'=>'crear'])


</form>
</div>
@endsection
