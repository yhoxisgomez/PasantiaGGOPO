@extends('adminlte::page')

@section('content')
 <div class="wrapper">

<form action="{{url('/usuarios/'.$usuarios->id)}} " method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}


@include('usuarios.form',['Modo'=>'editar'])

</form>
</div>
@endsection
