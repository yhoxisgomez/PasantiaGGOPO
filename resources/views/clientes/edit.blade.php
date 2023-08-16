@extends('adminlte::page')

@section('content')
 <div class="wrapper">

<form action="{{url('/clientes/'.$clientes->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('clientes.form',['Modo'=>'editar'])

</form>
</div>
@endsection
