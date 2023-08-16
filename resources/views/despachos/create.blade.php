@extends('adminlte::page')

@section('content')

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">

    <ul>
        @foreach($errors->all() as $error)

        <li> {{$error}} </li>

        @endforeach
    </ul>


</div>
@endif

<div class="wrapper">
<div class="card-header"><h4 class="text-center">DESPACHOS</h4></div>
<div class="card-body">
<form action="{{url('/despachos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}

@include('despachos.form',['Modo'=>'crear'])

</form>
</div>
 @endsection
