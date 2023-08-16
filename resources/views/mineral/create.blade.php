
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


<form action="{{url('/mineral')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}

@include('mineral.form',['Modo'=>'crear'])

</form>
</div>
 @endsection
