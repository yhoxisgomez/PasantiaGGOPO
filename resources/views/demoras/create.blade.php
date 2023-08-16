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
<div class="card-header"><h4 class="text-center">DEMORAS</h4></div>
<div class="card-body">
<form action="{{url('/demoras')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}

@include('demoras.form',['Modo'=>'crear'])


</form>
</div>
@endsection
